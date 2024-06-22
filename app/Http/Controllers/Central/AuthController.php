<?php

namespace App\Http\Controllers\Central;

use App\Models\User;
use App\Models\Tenant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Central\LoginRequest;
use App\Http\Requests\Central\RegisterRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request){

        $user = User::firstWhere("email", $request->email);
        
        if(!$user){
            return back()->withErrors(["email" => "Your Email is invalid"]);
        }

        if(!Hash::check($request->password, $user->password)){
            return back()->withErrors(["password" => "The Password You Entered Is Incorrect"]);
        }


        // Login the user 
        if(!auth()->loginUsingId($user->id, true)){
            return back()->with('error', 'Failed Login!');
        };

        // $tenant = Auth::user()->tenants()->first();

        // $domain = $tenant->domain;
        
        // $destination_domain = current_protocol() . $domain . config('tenant.central_domains')[1];

        return redirect()->route('app.dashboard')->withSuccess("Tenant Login Success!");
        
    }

    public function register(RegisterRequest $request){
       //Get Validated Values 
        $validated = $request->validated();

       //Create Tenant account 
        try{ 
            // Process Domain
            $subdomain = Str::slug(strtolower($request->domain));

            // Create User
            $user = User::create([
                'name' => $validated['name'], 
                'email' => $validated['email'],
                'password' => bcrypt($validated["password"]),
                'role' => \App\Enums\Role::ADMINISTRATOR
            ]);

            $tenant = Tenant::create([
                'id' => $user->id,
                'data' => json_encode([
                    'name' => $user->name,
                    'email' => $user->email
                ]) 
            ]);

            $tenant->domains()->create(['domain' => $subdomain]);

            $user->tenants()->attach($tenant->id);

            // Update The Tenant
            $user->update(['tenant_id' => $tenant->id]);

           // Login the user 
            if(Auth::loginUsingId($user->id)){
                return back()->with('error', 'Failed Login!');
            };

            $request->session()->regenerate();

        //     // Generate domain with or without port
        //     $port = $_SERVER['SERVER_PORT'] ? ':' . $_SERVER['SERVER_PORT'] : ''; 
        //     $domain = config('tenancy.central_domains')[1] . $port;
            
        //    //Generate The Destination Domain 
        //     $destination_domain = current_protocol() . "$subdomain." . $domain;

        //     // return redirect()->to($destination_domain)->withSuccess('Tenant Registration Successful');
        //     return redirect(tenant_route($domain, 'tenant.home'));

            return redirect()->route('app.dashboard')->withSuccess('Tenant Registeration Success');

        }catch(\Exception $e){
            return back()->with("error", $e->getMessage());
        }
    }
    
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route("home");
    }
    
}
