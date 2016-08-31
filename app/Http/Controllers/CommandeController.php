<?php

namespace App\Http\Controllers;

use App\Metier\ProductService;
use App\Metier\UserService;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class CommandeController extends Controller
{

    protected $productService;
    protected $userService;

    public function __construct(ProductService $productService, UserService $userService)
    {
        $this->productService = $productService;
        $this->userService = $userService;
    }

    public function getCommande($commandeID)
    {
        $userID = Auth::user()->client_id;
        $states = $this->userService->getAllStates();
        $country = $this->userService->getAllCountry();
        $livres = $this->productService->getWishList($userID);
        $order = $this->productService->getOrderById($commandeID);
        Log::info($order);
        return view("order")
            ->with(compact("states", "country", "livres", "order"));
    }

    public function generatePDF($commandeID)
    {
        $order = $this->productService->getOrderById($commandeID);
        Log::info($order);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('facture', compact("order"));

        return $pdf->stream();

    }
}
