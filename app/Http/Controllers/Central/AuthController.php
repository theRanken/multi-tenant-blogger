<?php

namespace App\Http\Controllers\Central;

use App\Models\User;
use App\Models\Tenant;
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

        $user = User::where("email", $request->email)->first();

        if(!Hash::check($request->password, $user->password)){
            return redirect()->back()->withErrors("password","The Password You Entered Is Incorrect");
        }

        Auth::login($user);

        $request->session()->regenerate();

        $domain = '';
        
        $destination_domain = current_protocol() . $domain . config('tenant.central_domains')[1];

        return redirect()->intended($destination_domain)->withSuccess("Tenant Registeration Success!");
        
    }

    public function register(RegisterRequest $request){
       //Get Validated Values 
        $validated = $request->validated();

        // Mutate and Redact password
        $validated["password"] = bcrypt($validated["password"]);

       //Create Tenant account 
        try{

            DB::beginTransaction();

            // Create User
            $user = User::create([
                ...$validated, 
                'role' => \App\Enums\Role::ADMINISTRATOR
            ]);
            $tenant = Tenant::create([
                'id' => $user->id,
                'name'=> $user->name,
                'email'=> $user->email,
            ]);
            $tenant->createDomain(['domain' => $validated['domain']]);

            $user->tenants()->attach($tenant->id);

            DB::commit();

           // Login the user 
            Auth::login($user);

           //Generate The Destination Domain 
            $destination_domain = current_protocol() . $validated['domain'] . config('tenant.central_domains')[1];

            return redirect($destination_domain)->withSuccess("Tenant Registeration Success!");

        }catch(\Exception $e){
            DB::rollBack();
            return back()->with("error", $e->getMessage());
        }
    }
    
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route("central.home");
    }
    
}
