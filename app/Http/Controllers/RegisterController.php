<?php
/**
 * Created by PhpStorm.
 * User: Abbes
 * Date: 27/04/2016
 * Time: 15:25
 */

namespace App\Http\Controllers;


use App\Metier\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\Redirect;
use Tymon\JWTAuth\Facades\JWTAuth;
use Mail;



class RegisterController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view("register");
    }

    public function register(Request $request)
    {
        $val_code = $this->generate_random_string(12);
        $email = $request->input("email");
        $name = $request->input("name");
        $first_name = substr($name, 0, strpos($name, " "));
        $last_name = substr(strpos($name, " "), strlen($name) - strpos($name, " "));
        Mail::send("emailPage", ["name" => $request->input("name"),
            "email" => $request->input("email"), "link" => "http://localhost/register/" . $val_code], function ($message) use ($email) {
            $message->to($email)->subject("Verification Email");
        });

        $this->userService->addUser($email, $first_name, $last_name, $request->input("password"), $val_code);

        return redirect("/register");
    }

    function generate_random_string($name_length = 8)
    {
        $alpha_numeric = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        return substr(str_shuffle(str_repeat($alpha_numeric, $name_length)), 0, $name_length);
    }

    public function valideEmail($valid)
    {
        $exist = $this->userService->verifMail($valid);
        if ($exist) {
            $this->userService->activateUser($valid);
            return view("register"); //TODO :: With OK
        }

        return view("register"); //TODO :: With ERROR
    }
    public function confirm($confirmation_code)
    {
        
        $user = Client::whereConfirmationCode($confirmation_code)->first();
        if($user) {
            $user->confirmed = 1;
            $user->confirmation_code = null;
            $user->save();
        }

        return Redirect::to('/register');
    }

}