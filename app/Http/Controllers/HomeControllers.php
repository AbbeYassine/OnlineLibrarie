<?php

namespace App\Http\Controllers;

use App\Metier\ProductService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class HomeControllers extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function Home()
    {

        $livres = $this->productService->getProducts();

        $livres = $this->addRatingAttribute($livres);


        return view("main")
            ->with(compact("livres"));
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
