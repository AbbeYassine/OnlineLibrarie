<?php

namespace App\Http\Controllers;

use App\Metier\ProductService;
use App\Metier\UserService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Psy\Util\Json;


class CheckoutController extends Controller
{
    protected $userService;
    protected $productService;

    public function __construct(UserService $userService, ProductService $productService)
    {
        $this->userService = $userService;
        $this->productService = $productService;
    }

    public function index()
    {
        $states = $this->userService->getAllStates();
        $country = $this->userService->getAllCountry();
        //Retrive from DataBase
        $livres = $this->productService->getLivreByPanier(Auth::user()->client_id);

        return view("checkoutView")
            ->with(compact("states", "country", "livres"));
    }

    public function submit()
    {
        //Retrive from DataBase
        $userID = Auth::user()->client_id;
        $livres = $this->productService->getLivreByPanier($userID);
        $sum = $this->getSum($livres);
        $commande = $this->productService->storeCommande($userID, $sum);
        $this->productService->updateLivre($livres);
        $this->productService->saveLigneCommande($commande->commande_id, $livres);
        $this->productService->deleteFromPanier($userID);

        Session::forget("number");

        if (Input::get("pdf") == 1) {
            return redirect()->action('CommandeController@generatePDF', ["commandeID" => $commande->commande_id]);
        } else {
            return redirect("/");
        }


    }

    private function getSum($livres)
    {
        $sum = 0;
        foreach ($livres as $livre) {
            $sum += $livre->prix * $livre->Quantite;
        }
        return $sum;
    }
}
