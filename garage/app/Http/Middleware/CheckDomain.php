<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $currentRoute = request()->getPathInfo();

        $checkRoute = ['/domain', '/logout', '/update_domain', '/updateDB', '/Update_version'];

        if (in_array($currentRoute, $checkRoute) || ! Auth::check()) {
            return $next($request);
        } else {
            // Check if the request is coming from the whitelist of IP addresses or localhost
            $current_domain = $_SERVER['SERVER_NAME'];
            $whitelist = [
                '127.0.0.1', // IPv4 address
                '::1',       // IPv6 address
                'localhost',
                'garage.test',
                'garagemaster_web.test',
            ];

            if (in_array($current_domain, $whitelist)) {
                return $next($request);
            }

            if (isAdmin(Auth::user()->id)) {
                $setting = DB::table('tbl_settings')->first();
                $licence_key = $setting->licence_key;
                $api_server = 'license.dasinfomedia.com';
                $fp = @fsockopen($api_server, 80, $errno, $errstr, 2);
                if (! $fp) {
                    $server_rerror = 'Down';
                } else {
                    $server_rerror = 'up';
                }
                $response_data = ['message' => 'invalid-license'];

                if ($server_rerror == 'up') {
                    $url = 'https://license.dasinfomedia.com/admin/api/license/verify?pkey='.urlencode($licence_key);

                    $ch = curl_init();

                    curl_setopt_array($ch, [
                        CURLOPT_URL => $url,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_CUSTOMREQUEST => 'GET',
                        CURLOPT_TIMEOUT => 10,
                        CURLOPT_SSL_VERIFYPEER => false, // Optional: for testing only
                        CURLOPT_HTTPHEADER => [
                            'Content-Type: application/json',
                            'Accept: application/json',
                        ],
                        CURLOPT_SSL_VERIFYHOST => false,
                    ]);

                    $response = curl_exec($ch);

                    curl_close($ch);
                    // Parse the JSON response
                    $response_data = json_decode($response, true);
                    // dd($response_data['data']);
                }

                $result = $response_data['message'] ?? '';  

                if ($result == 'registered') {
                    return $next($request);
                } else {
                    return redirect()->route('domain');
                }
            } else {
                return $next($request);
            }
        }
    }
}
