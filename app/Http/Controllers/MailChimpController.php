<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Exception;

class MailChimpController extends Controller
{
    public function subscribe(Request $request) {
        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config("services.mailchimp.key"),
            'server' => 'us7'
        ]);
        
        $list_id = "303be88c66";
        $subscriber_hash = md5(strtolower($request->email));

        try {
            $response = $mailchimp->lists->getListMember($list_id, $subscriber_hash);
            Alert::success('Success', 'Thank you for subscribing to our newsletter!');
        } catch (Exception $e) {
            try {
                $response = $mailchimp->lists->addListMember($list_id, [
                    "email_address" => $request->email,
                    "status" => "subscribed"
                ]);

                Alert::success('Success', 'Thank you for subscribing to our newsletter!');
                
            } catch (Exception $e) {
                Alert::error('Error Occurred!', $e->getMessage());
            }
        }
        return redirect()->back();
    }
}
