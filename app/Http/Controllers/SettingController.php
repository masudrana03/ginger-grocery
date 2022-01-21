<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Components\Email\Email;
use Illuminate\Support\Facades\Cache;
use App\Components\Email\EmailFactory;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generalSetting()
    {
        $settings = $this->getSettings();

        return view('backend.settings.general', compact('settings'));
    }

    /**
     * No loops. Max 1 DB hit per request. Max 1 Cache hit per request
     *
     * @return array
     */
    public function getSettings()
    {
        $key = "settings.get";
        return Cache::remember($key, 24 * 60, function () {
            return Setting::pluck('value', 'key')->toArray();
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generalSettingsUpdate(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required|string|max:255',
        ]);

        $logoName    = '';
        $faviconName = '';

        if ($request->hasFile('logo')) {
            $imageDirectory = 'assets/img/uploads/settings/logo';

            deleteImage(settings('logo'), $imageDirectory);

            $image             = $request->file('logo');
            $logoName          = generateUniqueFileName($image->getClientOriginalExtension());
            $location          = public_path('assets/img/uploads/settings/logo/' . $logoName);
            $thumbnailLocation = public_path('assets/img/uploads/settings/logo/thumbnail/' . $logoName);

            saveImageWithThumbnail($image, $location, $thumbnailLocation);
        }

        if ($request->hasFile('favicon')) {
            $imageDirectory = 'assets/img/uploads/settings/favicon';

            deleteImage(settings('favicon'), $imageDirectory);

            $image             = $request->file('favicon');
            $faviconName          = generateUniqueFileName($image->getClientOriginalExtension());
            $location          = public_path('assets/img/uploads/settings/favicon/' . $faviconName);
            $thumbnailLocation = public_path('assets/img/uploads/settings/favicon/thumbnail/' . $faviconName);

            saveImageWithThumbnail($image, $location, $thumbnailLocation);
        }

        $request = $request->except('_token', 'logo', 'favicon');

        if ($logoName != '') {
            $request['logo'] = $logoName;
        }

        if ($faviconName != '') {
            $request['favicon'] = $faviconName;
        }

        foreach ($request as $key => $value) {
            Setting::where('key', $key)->update(['value' => $value]);
        }

        toast('General settings successfully updated', 'success');

        Artisan::call('cache:clear');

        return back();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function emailSetting()
    {
        return view('backend.settings.email');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function emailSettingsUpdate(Request $request)
    {
        $request = $request->except('_token');

        foreach ($request as $key => $value) {
            Setting::where('key', $key)->update(['value' => $value]);
        }

        toast('Email settings successfully updated', 'success');

        Artisan::call('cache:clear');

        return back();
    }

    /**
     * Send email for testing
     *
     * @param Request $request
     */
    public function sendTestMail(Request $request)
    {
        $subject = 'Testing Email';
        $message = 'This is a test email, please ignore if you are not meant to be get this email.';

        try {
            $emailDetails = [
                'to'      => $request->email,
                'subject' => $subject,
                'body'    => $message,
            ];

            new EmailFactory($emailDetails);

            toast('You will receive a test email soon', 'success');

            return back();
        } catch (Exception $e) {
            info($e->getMessage(), [$e]);
            toast('Failed, please check your email settings', 'error');

            return back();
        }
    }

    /**
     * Payment gateway settings
     */
    public function paymentGatewaySetting()
    {
        $strripe = PaymentMethod::whereProvider('stripe')->first();
        $cash    = PaymentMethod::whereProvider('cash')->first();

        return view('backend.settings.payment', compact('strripe', 'cash'));
    }

    /**
     * Update payment gateway settings
     *
     * @param Request $request
     */
    public function paymentSettingsUpdate(Request $request)
    {
        if ($request->provider != 'cash') {
            $this->validate($request, [
                'client_key' => 'required',
                'client_secret' => 'required'
            ]);
        }

        $paymentMethod = PaymentMethod::whereProvider($request->provider)->firstOrFail();

        $paymentMethod->update($request->all());

        toast('Payment method successfully updated', 'success');

        return back();
    }
}
