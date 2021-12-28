<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ContactInfo;
use Illuminate\Http\Request;
use App\Models\ContactWithUs;
use App\Models\EmailTemplate;
use App\Http\Controllers\Controller;
use App\Components\Email\EmailFactory;

class ContactController extends Controller
{

    /**
     * @param $request
     */
    public function contactMassage(Request $request)
    {
        $request->validate( [
            'name'    => 'required',
            'email'   => 'required',
            'phone'   => 'required',
            'subject' => 'required',
            'massage' => 'required'
        ]);

        $ContactMassage = new ContactWithUs();
        $ContactMassage->name    = $request->name;
        $ContactMassage->email   = $request->email;
        $ContactMassage->phone   = $request->phone;
        $ContactMassage->subject = $request->subject;
        $ContactMassage->massage = $request->massage;
        $ContactMassage->save();

        if( !$request->email ){
            return back()->with( 'error', 'Please input your mail address' );
        }

        $this->sendConfirmationEmail( $request );

        return back()->with( 'success', 'Message sent successfully' );

    }

    /**
     * Send thanks giving email .
     *
     * @param object $request
     */
    public function sendConfirmationEmail( $request )
    {
        $emailTemplate = EmailTemplate::whereType('contact_message')->first();

        $body = preg_replace("/{name}/", $request->name, $emailTemplate->body);

        $emailDetails = [
            'email'   => $request->email,
            'subject' => $emailTemplate->subject,
            'body'    => $body
        ];

        (new EmailFactory())->initializeEmail($emailDetails);

        return $emailDetails;
    }


    public function contact()
    {
        $contacts = ContactInfo::all();
        return view('frontend.contact', compact('contacts'));
    }

}
