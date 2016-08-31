<?php

namespace App\Http\Controllers;

use App\Metier\ProductService;
use App\Metier\UserService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
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
        return view("admin.statistic");
    }

    public function listUser()
    {
        $users = $this->userService->getAllUser();
        $affich = "none";
        return view("admin.listUser")
            ->with(compact("users", "affich"));
    }

    public function deleteUser($userID)
    {
        $this->userService->deleteUser($userID);
        return Redirect::back();
    }

    public function listUserDelete()
    {
        $users = $this->userService->getAllUser();
        $affich = "";
        return view("admin.listUser")
            ->with(compact("users", "affich"));
    }

    public function statisticBook()
    {
        $numberBooks = $this->productService->getNumberBooks();
        $data = $this->getData($this->productService->numberLivreByLangue());
        $typeLivre = $this->getTypeLivre($this->productService->numberLivreByType());
        return view("admin.statistic")
            ->with(compact("numberBooks", "data", "typeLivre"));
    }

    public function addBookForm()
    {
        $types = $this->productService->getAllTypes();
        $languages = $this->productService->getAllLang();
        return view("admin.addBookForm")
            ->with(compact("types", "languages"));
    }

    public function addBook(Request $request)
    {
        $data = $request->all();
        if (Input::hasFile("image"))
            $photo = $this->getPhoto(Input::file('image'));


        $this->productService->createLivre($data, $photo);
        return Redirect::back()
            ->withOk("Create Book successfully");
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

    public function login()
    {
        return view("admin.login");
    }

    public function listBook()
    {
        $livres = $this->productService->getAllBooks();
        return view("admin.listBook")
            ->with(compact("livres"));
    }

    public function deletBook($bookID)
    {
        $this->productService->deleteBook($bookID);
        return Redirect::back();
    }

    private function getData($numberLivreByLangue)
    {
        $data = array();
        foreach ($numberLivreByLangue as $item) {
            $data1 = array();
            $data1["langue"] = $item["libelle"];
            $data1["number"] = $item["nbLivre"];
            array_push($data, $data1);
        }
        return json_encode($data);
    }

    private function getTypeLivre($numberLivreByType)
    {
        $data = array();
        foreach ($numberLivreByType as $item) {
            $data1 = array();
            $data1["label"] = $item["libelle"];
            $data1["value"] = $item["nbLivre"];
            array_push($data, $data1);
        }
        return json_encode($data);
    }

    public function BooksSold()
    {
        $livres = $this->productService->getBookSold();
        return view("admin.listBookSold")
            ->with(compact("livres"));
    }
}
