<?php

namespace App\Http\Controllers;

use App\Metier\ProductService;
use App\Metier\UserService;
use app\Models\FavoriteUser;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Psy\Util\Json;

class UserController extends Controller
{
    protected $userService;
    protected $productService;

    public function __construct(UserService $userService, ProductService $productService)
    {
        $this->userService = $userService;
        $this->productService = $productService;
    }


    public function retriveAll()
    {
        return response()->json(["users" => $this->userService->retriveAllUser()]);
    }

    public function addUser(Request $request)
    {

        return $this->userService->addUser($request->json()->all());
    }

    public function deleteUser($userId)
    {
        if ($this->userService->deleteUser($userId) == 1) {
            return response()->json(["delete" => "success"]);
        } else {
            return response()->json(["delete" => "failure"]);
        }

    }

    public function home($userID)
    {
        $states = $this->userService->getAllStates();
        $country = $this->userService->getAllCountry();
        $livres = $this->productService->getWishList($userID);
        $commandes = $this->productService->getCommandesByUser($userID);
        return view("userCount")
            ->with(compact("states", "country", "livres", "commandes"));
    }

    public function modify($userID, Request $request)
    {
        $data = $request->all();
        $photo = "upload/avatar.jpg";
        if (Input::hasFile("image"))
            $photo = $this->getPhoto(Input::file('image'));

        $this->userService->modifyUser($userID, $data, $photo);
        return redirect("/user/" . Auth::user()->client_id);
    }

    public function modifyPass($userID, Request $request)
    {
        $data = $request->all();
        $this->userService->modifyPassword($userID, $data);
        return redirect("/user/" . Auth::user()->client_id);

    }


    public function addPanier($userID, $livreId)
    {

        //if idUser =0 Add To session
        //else Add To DataBase
        $numbers = Session::get("number", 0) + 1;
        Session::put("number", $numbers);
        if ($userID == 0) {
            //Add Session
            $panier = Session::get("panier", array());
            $i = 0;
            $check = true;
            foreach ($panier as $item) {
                if ($item["id_user"] == $userID && $item["id_livre"] == $livreId) {
                    $item["Quantite"] += 1;
                    $panier[$i] = $item;
                    $check = false;
                }
                $i++;
            }
            if ($check) {
                $value = [
                    "id_user" => $userID,
                    "id_livre" => $livreId,
                    "Quantite" => 1
                ];
                Session::put("panier", array_add($panier, count($panier), $value));
            } else {
                Session::put("panier", $panier);
            }

        } else {
            $this->userService->addToPanier($userID, $livreId);
        }

        return Redirect::back();

    }

    public function addWishList($userID, $livreID)
    {
        $this->userService->addWishList($userID, $livreID);
        return Redirect::back();
    }

    public function deletePanier($livreID)
    {
        if (!Auth::check()) {
            $array = Session::get("panier", array());
            $index = 0;
            foreach ($array as $item) {
                if ($item["id_livre"] == $livreID) {
                    unset($array[$index]);
                    break;
                }
                $index++;
            }
            Session::put("panier", $array);
            Session::put("number", Session::get("number", 0) - $item["Quantite"]);

        } else {
            $this->productService->deleteBookFromPanier($livreID, Auth::user()->client_id);
        }
        return Redirect::back();
    }

    private function getPhoto($image)
    {

        $chemin = config("images.path");
        $extension = $image->getClientOriginalExtension();
        do {
            $nom = str_random(10) . '.' . $extension;
        } while (file_exists($chemin . '/' . $nom));

        $image->move($chemin, $nom);
        return $chemin . '/' . $nom;
    }
}
