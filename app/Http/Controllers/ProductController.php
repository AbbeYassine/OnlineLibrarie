<?php

namespace App\Http\Controllers;

use App\Metier\CommentService;
use App\Metier\ProductService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    protected $productService;
    protected $commentService;

    public function __construct(ProductService $productService, CommentService $commentService)
    {
        $this->productService = $productService;
        $this->commentService = $commentService;
    }

    public function getLivreById($livreId)
    {
        $livre = $this->productService->getProductById($livreId);
        $r = $this->productService->getRatingByLivre($livre);
        $livre["rating"] = $r["rating"];
        if (Auth::check()) {
            $likes = $this->productService->getWishList(Auth::user()->client_id);
            $likes = $this->addRatingAttribute($likes);
        }
        $comments = $this->commentService->getCommentsByLivre($livreId);


        return view("detailLivre")
            ->with(compact("livre", "likes", "comments"));
    }

    public function getLivreByCategory($categoryID)
    {
        $livres = $this->productService->getProductByCategory($categoryID);
        $livres = $this->addRatingAttribute($livres);

        return view("resultSearch")
            ->with(compact('livres'));
    }

    public function getLivreByName(Request $request)
    {
        $name = $request->input("searchName");
        $livres = $this->productService->getProductByName($name);
        $livres = $this->addRatingAttribute($livres);
        return view("resultSearch")
            ->with(compact("livres"));
    }

    public function getPanier($userID)
    {
        if ($userID == 0) {
            //Retrive from Session
            $panier = Session::get("panier", array());
            $livres = $this->getLivresFromSession($panier);

        } else {
            //Retrive from DataBase
            $livres = $this->productService->getLivreByPanier($userID);
        }
        $livreLike = $this->productService->getWishList($userID);
        $livreLike = $this->addRatingAttribute($livreLike);


        return view("panier")
            ->with(compact("livres", "livreLike"));
    }

    private function getLivresFromSession($panier)
    {

        return $this->productService->getLivreBySession($panier);

    }

    public function getLivreByLettre()
    {
        $mot = Str::lower(Input::get("term"));
        $livres = $this->productService->getLivreByLettre($mot);

        $array = $this->getArrayLivre($livres);
        \Log::info($array);
        return Response::json($array);
    }

    public function getBookByLang($idLang)
    {

        $livres = $this->productService->getBookByLang($idLang);
        $livres = $this->addRatingAttribute($livres);
        return view("resultSearch")
            ->with(compact("livres"));


    }

    private function getArrayLivre($livres)
    {
        $array = array();
        foreach ($livres as $livre) {
            array_push($array, $livre["nom"]);
        }
        return $array;
    }

    private function addRatingAttribute($livres)
    {
        foreach ($livres as $livre) {
            $r = $this->productService->getRatingByLivre($livre);
            $livre["rating"] = $r["rating"];
        }
        return $livres;
    }


}
