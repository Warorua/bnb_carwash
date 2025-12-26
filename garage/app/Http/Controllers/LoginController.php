<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use App\PurchaseApp;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $user = User::all();
        $email = $request->input('email');
        $password = $request->input('password');
        $purchaseData = PurchaseApp::first();
        if(!empty($purchaseData)){

        $user = User::where('email', $email)->first();

        if ($user && password_verify($password, $user->password)) {

            Auth::login($user);

            // return redirect()->route('dashboard');

            $response = [
                'status' => true,
                'code' => 200,
                'message' => 'Login Successfully',
                'data' => [
                    'Id' => $user->id,
                    'Name' => $user->name.' '.$user->lastname,
                    'Role' => $user->role,
                    'image' => $user->image ? url('public/admin/'.$user->image) : null,

                ],
            ];

            return Response::json($response, 200);
        }

        $response = [
            'status' => false,
            'code' => 401,
            'message' => 'Invalid credentials',
            'data' => null,
        ];

        return Response::json($response, 401);
        }
        else{
             $response = [
            'status' => false,
            'code' => 401,
            'message' => 'Register your mobile license key via the Garage web app:General Settings → Mobile App Settings',
            'data' => null,
        ];

        return Response::json($response, 401);
        }  
        // return redirect()->back();
    }
}
