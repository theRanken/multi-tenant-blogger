<?php

namespace App\Http\Controllers\Tenant;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Central\LoginRequest;
use App\Http\Requests\Central\RegisterRequest;

class TenantAuthController extends Controller
{
    public function login(Request $request){

        $credentials = $request->only("email","password");

        $validator = validator($request->all(), [
            "email" => "required|email|exists:users,email",
            "password" => "required|string"
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if(!Auth::attempt($credentials, true)){
            return back()->with([
                "error" => "Your Credentials Are Incorrect",
                "errors"=> [
                    "login_failed" => true,
                ]
            ]);
        }

        return back()->with('success', "Tenant Login Success!");

    }

    public function register(Request $request){
       //Get Validated Values
        $validator = validator($request->all(), [
            "name" => "required|string",
            "email" => "required|email|unique:users,email",
            "password" => "required|string|confirmed"
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors()->first());
        }

        // Validated Values
        $validated = $validator->validated();

       //Create Tenant account
        try{

            // Redact Password
            $validated['password'] = bcrypt($validated['password']);

            // Create User
            $user = User::create($validated);

           // Login the user
            if(!Auth::loginUsingId($user->id, true)){
                throw new \Exception('Login Failed');
            };

            return to_route('tenant.home')->with('success', 'Tenant Registration Success');

        }catch(\Exception $e){
            $errors = [
                'error' => $e->getMessage(),
                'errors' => [
                    'registration_failed' => true
                ]
            ];
            return back()->with($errors);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return to_route("tenant.home");
    }
}
