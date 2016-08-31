<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use  ThrottlesLogins, AuthenticatesAndRegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectPath;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:client',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        $email = $data["email"];
        $confirmation_code = str_random(30);
        Mail::send('emailPage', ["confirm" =>$confirmation_code], function($message)  use($email){
            $message->to($email)
                ->subject('Verify your email address');
        });

        return Client::create([
            'first_name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data["password"]),
            'confirmation_code' => $confirmation_code
        ]);



    }

    
}
