<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Laravel\Socialite\Facades\Socialite;
use App\Provider;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo(){



        if((auth()->user()->roles[0]->id != 5)){
            if((auth()->user()->roles[0]->id != 3)){

            return 'admin/dashboard';
            }}else{
                return '/';
            }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');

    }

    public function username()
    {
        $value = request()->input('identify'); // ahmed.emam.dev@gmail  or 293293923293
        $field = filter_var($value, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        request()->merge([$field =>$value ]);
        return  $field;
    }




    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        
        $provider_user= Provider::where('provider_id', $user->getId())->first();

        if(!$provider_user){
            // register
                // check if this email exsist 
                $userGetReal = User::where('email', $user->getEmail())->first();
                if(!$userGetReal){
                    $userGetReal = new User;
                    $userGetReal->first_name=$user->getName();
                    $userGetReal->email=$user->getEmail();
                    // $userGetReal->image=$user->getAvatar();
                    $userGetReal->save(); //save in users table
                }
             $provider_user = new Provider ;
            $provider_user->provider_id= $user->getId();
            $provider_user->provider= $provider;
            $provider_user->user_id= $userGetReal->id;
            $provider_user->save(); //save in providers table 


        }else{
            // login
            $userGetReal = User::find($provider_user->user_id);

        }

        auth()->login($userGetReal);
        return redirect('/');

        
        
        //dd($user);
        // $user->token;
    }


}
