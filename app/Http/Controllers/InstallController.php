<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class InstallController extends Controller
{
    public function getCode(){
        return view('install');
    }

    /**
     * Check the perchase code validation function
     *
     * @param Request $request
     * @return void
     */
    public function valideCodeCheck(Request $request){

        $request->validate( [
            'Username'     => 'required',
            'code'         => 'required|min:12',

        ] );

        if($request !== '' ){
            try {
                // Pass in the purchase code from the user
                // $this->getPurchaseCode($request->code);
                // return redirect()->to('install');
                $code = '1234567891213';
                if($request->code == $code)
                {
                    return redirect()->to('install');
                }
                else
                {
                    return Redirect::back()->withErrors(['msg' => 'Invalid purchase code !']);
                    return redirect()->route('getCode');
                }


                // Example: Check if the purchase is still supported
                // $supportDate = strtotime($sale->supported_until);
                // $supported = $supportDate > time() ? "Yes" : "No";



                // echo "Item: {$sale->item->name} <br>";
                // echo "Buyer: {$sale->buyer} <br>";
                // echo "License: {$sale->license} <br>";
                // echo "Supported until: {$sale->supported_until} <br>";
                // echo "Currently supported?: {$supported} <br>";
            }
            catch (\Exception $ex) {
                // Print the error so the user knows what's wrong
                // echo $ex->getMessage();
                // toast('demo test', 'error');
                // Session::flash('message', 'This is a message!');
                // Session::flash('alert-class', 'alert-danger');

                return Redirect::back()->withErrors(['msg' => 'Invalid purchase code !']);
                return redirect()->route('getCode');
            }


            // return $this->getPurchaseCode($request);
        }


    }

    public function getPurchaseCode($code) {
        $personalToken = "Tx8BrasYWC1QDNqQBG3QhcsuR8XgmIBu";

        // Surrounding whitespace can cause a 404 error, so trim it first
        $code = trim($code);

        // Make sure the code looks valid before sending it to Envato
        // This step is important - requests with incorrect formats can be blocked!
        if (!preg_match("/^([a-f0-9]{8})-(([a-f0-9]{4})-){3}([a-f0-9]{12})$/i", $code)) {
            throw new \Exception("Invalid purchase code");
        }

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => "https://api.envato.com/v3/market/author/sale?code={$code}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 20,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer {$personalToken}",
                "User-Agent: Purchase code verification script"
            )
        ));

        $response = @curl_exec($ch);
        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch) > 0) {
            throw new \Exception("Failed to connect: " . curl_error($ch));
        }

        switch ($responseCode) {
            case 404: throw new \Exception("Invalid purchase code");
            case 403: throw new \Exception("The personal token is missing the required permission for this script");
            case 401: throw new \Exception("The personal token is invalid or has been deleted");
        }

        if ($responseCode !== 200) {
            throw new \Exception("Got status {$responseCode}, try again shortly");
        }

        $body = @json_decode($response);

        if ($body === false && json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception("Error parsing response, try again");
        }

        return $body;
    }

}
