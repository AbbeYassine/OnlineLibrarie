<?php
/**
 * Created by PhpStorm.
 * User: Abbes
 * Date: 17/04/2016
 * Time: 12:21
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Metier\UserService;
use App\Models\Client;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Mail;


class AuthenticateController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function authenticate(Request $request)
    {

        $verif = $this->userService->verifUser($request->json()->all());
        if($verif){
            $credentials = [
                "email" => $request["email"],
                "password" => $request["password"]
            ];
            try {
                // verify the credentials and create a token for the user
                if (!$token = JWTAuth::attempt($credentials)) {
                    return response()->json(['error' => 'invalid_credentials'], 401);
                }
            } catch (JWTException $e) {
                // something went wrong
                return response()->json(['error' => 'could_not_create_token'], 500);
            }

            $this->userService->storeToken($request->json()->all(),$token);
            // the token is valid and we have found the user via the sub claim
            return response()->json(compact('token'));
        }else{
            return response()->json(["error"=>"Activate your Account"]);
        }




    }


    public function register(Request $request)
    {

        $response = $request->json()->all();

        $val_code = $this->generate_random_string(12);
        $email = $response["email"];
        Mail::send("emailPage", ["name" => $response["first_name"]." ".$response["last_name"],
            "email" => $response["email"] , "link"=>"http://localhost/UserService/validation/".$val_code], function ($message) use ($email) {
            $message->to($email)->subject("Verification Email");
        });

        return $this->userService->addUser($response,$val_code);
    }
    
    public function valideEmail($valid){

        $exist = $this->userService->verifMail($valid);
        if($exist){
            return $this->userService->activateUser($valid);
        }

        return $exist;
        
    }
    function generate_random_string($name_length = 8) {
        $alpha_numeric = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        return substr(str_shuffle(str_repeat($alpha_numeric, $name_length)), 0, $name_length);
    }
    


}