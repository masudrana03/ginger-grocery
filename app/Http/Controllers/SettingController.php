<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Components\Email\Email;
use App\Models\Country;
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
        $countries = Country::all();

        return view('backend.settings.general', compact('settings', 'countries'));
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
            // 'logo'         => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=215px,min_height=66px',
            // 'favicon'      => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=16px,min_height=16px',
            // 'mini_logos'   => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=32px,min_height=32px',
            //'login_image'   => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=600px,min_height=650px',
            //'contact_image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=600px,min_height=650px',
        ]);

        $logoName    = '';
        $faviconName = '';
        $miniLogo    = '';
        $loginImage  = '';
        $contactImage= '';


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

        if ($request->hasFile('mini_logo')) {
            $imageDirectory = 'assets/img/uploads/settings/logo';

            deleteImage(settings('mini_logo'), $imageDirectory);

            $image             = $request->file('mini_logo');
            $miniLogo       = generateUniqueFileName($image->getClientOriginalExtension());
            $location          = public_path('assets/img/uploads/settings/logo/' . $miniLogo);
            $thumbnailLocation = public_path('assets/img/uploads/settings/logo/thumbnail/' . $miniLogo);

            saveImageWithThumbnail($image, $location, $thumbnailLocation);
        }

        if ($request->hasFile('login_image')) {
            $imageDirectory = 'assets/img/uploads/settings/loginImage';

            deleteImage(settings('login_image'), $imageDirectory);

            $image             = $request->file('login_image');
            $loginImage       = generateUniqueFileName($image->getClientOriginalExtension());
            $location          = public_path('assets/img/uploads/settings/loginImage/' . $loginImage);
            $thumbnailLocation = public_path('assets/img/uploads/settings/loginImage/thumbnail/' . $loginImage);

            saveImageWithThumbnail($image, $location, $thumbnailLocation);
        }


        if ($request->hasFile('contact_image')) {
            $imageDirectory = 'assets/img/uploads/settings/contactImage';

            deleteImage(settings('contact_image'), $imageDirectory);

            $image             = $request->file('contact_image');
            $contactImage       = generateUniqueFileName($image->getClientOriginalExtension());
            $location          = public_path('assets/img/uploads/settings/contactImage/' . $contactImage);
            $thumbnailLocation = public_path('assets/img/uploads/settings/contactImage/thumbnail/' . $contactImage);

            saveImageWithThumbnail($image, $location, $thumbnailLocation);
        }

        $request = $request->except('_token', 'logo', 'favicon','mini_logo','login_image','contact_image');

        if ($logoName != '') {
            $request['logo'] = $logoName;
        }

        if ($faviconName != '') {
            $request['favicon'] = $faviconName;
        }

        if ($miniLogo != '') {
            $request['mini_logo'] = $miniLogo;
        }

        if ($loginImage != '') {
            $request['login_image'] = $loginImage;
        }


        if ($contactImage != '') {
            $request['contact_image'] = $contactImage;
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
