<?php

namespace App\Http\Controllers;

use App\Metier\ProductService;
use App\Models\Client;
use Illuminate\Http\Request;

use App\Http\Requests;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class MobileController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getBooks()
    {
        $livres = $this->productService->getAllBooks();
        $livres = $this->addRatingAttribute($livres);
        return response()->json(["response" => $livres]);
    }


    public function getWishList($userId)
    {

        return response()->json(["response" => $this->productService->getWishList($userId)]);

    }

    public function getBooksByCle($cle)
    {
        $livres = $this->productService->getProductByCle($cle);
        $livres = $this->addRatingAttribute($livres);
        return response()->json(["response" => $livres]);
    }

    private function addRatingAttribute($livres)
    {
        foreach ($livres as $livre) {
            $r = $this->productService->getRatingByLivre($livre);
            if ($r["rating"] == null) {
                $livre["rating"] = 0;
            } else
                $livre["rating"] = $r["rating"];
        }
        return $livres;
    }

    function signin(Request $request)
    {
        ini_set('xdebug.max_nesting_level', 200);

        $credentials = $request->only('email', 'password');
        //return $credentials;
        $user = Client::whereEmail($request->input('email'))->get()->first();
        if ($user == null) {
            return response()->json(['response' => 'invalid_user'], 500);
        } else {
            if ($user->confirmed == 0) {
                return response()->json(['response' => 'inactive_account'], 402);
            } else {
                try {
                    // verify the credentials and create a token for the user
                    if (!$token = JWTAuth::attempt($credentials)) {
                        return response()->json(['response' => 'invalid_credentials'], 401);
                    }

                } catch (JWTException $e) {
                    // something went wrong
                    return response()->json(['response' => 'could_not_create_token'], 500);
                }

                // if no errors are encountered we can return a JWT
                return response()->json(compact('token', 'user'), 200);
            }
        }
    }
   


}
