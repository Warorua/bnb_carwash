<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseApp;
use App\Setting;

class MobileSettingController extends Controller
{
    public function index()
    {
        $purchaseData = PurchaseApp::first();
        return view('mobile_setting.list',compact('purchaseData'));
    }

    public function store(Request $request){
        $domain_name = $request->domain_name;
        $licence_key = $request->purchase_key;
        $purchase_email = $request->purchase_email;
        $api_server = 'license.dasinfomedia.com';

        // $whitelist = [
        //     '192.168.1.62',
        // ];
        // if (!in_array($domain_name, $whitelist)) {

        $fp = @fsockopen($api_server, 80, $errno, $errstr, 2);
        if (! $fp) {
            $server_rerror = 'Down';
        } else {
            $server_rerror = 'up';
        }

        if ($server_rerror == 'up') {
            $url = 'https://license.dasinfomedia.com/admin/api/license/register';
            $fields = [
                'pkey' => $licence_key,
                'email' => $purchase_email,
                'domain' => $domain_name,
            ];

            $ch = curl_init();

            curl_setopt_array($ch, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($fields),
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                    'Accept: application/json',
                ],
                CURLOPT_SSL_VERIFYPEER => false, // 🧩 Disable SSL verification if needed
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_TIMEOUT => 30,
            ]);

            $response = curl_exec($ch);


            curl_close($ch);

            // Parse the JSON response
            $response_data = json_decode($response, true);
            $result = $response_data['message'] ?? '';
           
            if ($result == 'Invalid MojooMla license') {
                return redirect('/setting/mobile_setting/list')->with('message', '1');
                exit;
            } elseif ($result == 'License registered successfully') {
                return redirect('/setting/mobile_setting/list')->with('message', '6');
                exit;
            }elseif ($result == 'License already registered') {
                return redirect('/setting/mobile_setting/list')->with('message', '2');
                exit;
            } elseif ($result == 'Please enter a valid URL') {
                return redirect('/setting/mobile_setting/list')->with('message', '3');
                exit;
            } elseif ($result == 'License already registered with the same domain') {
                return redirect('/setting/mobile_setting/list')->with('message', '4');
                exit;
            } 
        } else {
            return redirect('/setting/mobile_setting/list')->with('message', '5');
            exit;
        }
        // }
        if (!preg_match("~^(http|https)://~", $domain_name)) {
            $app_url = "https://" . $domain_name;
        } else {
            $app_url = $domain_name;
        }

        $purchaseApp = PurchaseApp::updateOrCreate(['app_email' => $purchase_email, 'app_url' => $app_url, 'app_licence_key' => $licence_key]);

        return redirect('/setting/mobile_setting/list')->with('message', 'License Registered Successfully');
    }
}
