<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get("/register/{valid}", "RegisterController@valideEmail");
Route::get("/", "HomeControllers@home");
Route::get('auth/logout', 'Auth\AuthController@logout');
Route::get("getLivreByLettre", "ProductController@getLivreByLettre");

Route::group(["middleware" => "auth.client"], function () {
    Route::group(["prefix" => "checkout"], function () {
        Route::get("/", "CheckoutController@index");
        Route::get("/submit", "CheckoutController@submit");
    });
});

Route::group(["prefix" => "api"], function () {

    Route::post("/signin", "MobileController@signin");
    Route::post("/signup", "Auth\AuthController@registerMobile");
    Route::group(["prefix" => "BookService"], function () {
        Route::get("/books/{cle}", "MobileController@getBooksByCle");
        Route::get("/books", "MobileController@getBooks");
    });
    Route::group(['middleware' => ['jwt.auth']], function () {
        Route::get("/wishlist/{userId}", "MobileController@getWishList");
    });

});

Route::group(["prefix" => "admin"], function () {

    Route::get("/login", "AdminController@login");
    Route::group(["middleware" => "auth.admin"], function () {
        Route::get("/", "AdminController@statisticBook");
        Route::get("/listUser", "AdminController@listUser");
        Route::get("/delete/{userID}", "AdminController@deleteUser");
        Route::get("/deleteUser", "AdminController@listUserDelete");
        Route::get("/statistic", "AdminController@statisticBook");
        Route::get("/addBook", "AdminController@addBookForm");
        Route::post("/addBook", "AdminController@addBook");
        Route::get("/listBook", "AdminController@listBook");
        Route::get("/deleteBook/{bookID}", "AdminController@deletBook");
        Route::get("/BooksSold", "AdminController@BooksSold");
    });

});

Route::group(["prefix" => "user"], function () {
    Route::get("/{userID}", "UserController@home");
    Route::post("/{userID}/modify", "UserController@modify");
    Route::post("/{userID}/modifyPass", "UserController@modifyPass");
    Route::get("/{userID}/panier", "ProductController@getPanier");
    Route::get("/{userID}/{livreId}/addPanier", "UserController@addPanier");
    Route::get("/{userID}/{livreID}/addWishList", "UserController@addWishList");
    Route::get("/delete/panier/{livreID}", "UserController@deletePanier");
    Route::get("/order/{commandeID}", "CommandeController@getCommande");
    Route::get("/order/{commandeID}/generate", "CommandeController@generatePDF");
});
Route::group(["prefix" => "comment"], function () {
    Route::post("/{userID}/{livreID}/add", "CommentController@store");
});

Route::group(["prefix" => "livre"], function () {
    Route::get("/{livreId}", "ProductController@getLivreById");
    Route::get("/search/{category}", "ProductController@getLivreByCategory");
    Route::get("/lang/{idLang}", "ProductController@getBookByLang");
    Route::post("/search", "ProductController@getLivreByName");

});
Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'RegisterController@confirm'
]);


Route::auth();
Route::get('/', 'HomeControllers@home');


