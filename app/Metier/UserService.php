<?php
/**
 * Created by PhpStorm.
 * User: Abbes
 * Date: 14/04/2016
 * Time: 13:56
 */

namespace App\Metier;

use App\Models\Client;
use App\Models\FavoriteUser;
use App\Models\Panier;
use App\Models\Pays;
use App\Models\Ville;
use Illuminate\Support\Facades\Hash;


class UserService
{

    public function retriveAllUser()
    {
        return Client::all();
    }

    public function addUser($email, $first_name, $last_name, $password, $val_code)
    {
        $client = new Client;

        $client->first_name = $first_name;
        $client->last_name = $last_name;
        $client->password = bcrypt($password);
        $client->email = $email;
        $client->val_activation = $val_code;
        $client->active = 0;
        $client->ville_id = 1;
        $client->save();

        return $client;
    }

    public function deleteUser($userId)
    {
        return Client::where("client_id", "=", $userId)->delete();
    }

    public function getUser($request)
    {

    }


    public function verifMail($valid)
    {
        return Client::Where("val_activation", "=", $valid)->firstOrFail();
    }

    public function activateUser($valid)
    {
        return Client::where("val_activation", "=", $valid)
            ->update(["active" => 1]);
    }

    public function verifUser($response)
    {
        return Client::Where("email", "=", $response["email"])
            ->where("active", "=", "1");
    }

    public function storeToken($response, $token)
    {
        return Client::where("email", "=", $response["email"])
            ->update(["remember_token" => $token]);
    }

    public function getAllStates()
    {
        return Pays::all();
    }

    public function getAllCountry()
    {
        return Ville::all();
    }

    public function modifyUser($userID, $data, $photo)
    {
        $client = Client::find($userID);
        $client->email = $data["email"];
        $client->first_name = $data["first_name"];
        $client->last_name = $data["last_name"];
        $client->street = $data["street"];
        $client->zip = $data["zip"];
        $client->phone = $data["phone"];
        $client->ville_id = $data["country"];
        $client->avatar = $photo;
        return $client->save();
    }

    public function modifyPassword($userID, $data)
    {

        $client = Client::Where("client_id", "=", $userID)
            ->firstOrFail();

        if ($client) {
            if (Hash::check($data["password_old"], $client->password) && Hash::check($data["password_1"], $data["password_2"]))
                $client->password = bcrypt($data["password_1"]);
            return $client->save();

        }


    }

    public function addWishList($userID, $livreID)
    {
        $livre = FavoriteUser::where("user_id", "=", $userID)
            ->where("livre_id", "=", $livreID)
            ->first();
        if (!$livre) {
            $favoriteUser = new FavoriteUser;
            $favoriteUser->user_id = $userID;
            $favoriteUser->livre_id = $livreID;
            $favoriteUser->save();
        }

    }

    public function getAllUser()
    {
        return Client::all();
    }

    public function addToPanier($userID, $livreId)
    {

        $panier = Panier::where("user_id", "=", $userID)
            ->where("livre_id", "=", $livreId)
            ->first();

        if ($panier) {
            $panier->Quantite = $panier->Quantite + 1;
            $panier->save();
        } else {
            $panier = new Panier;
            $panier->user_id = $userID;
            $panier->livre_id = $livreId;
            $panier->Quantite = 1;
            $panier->save();
        }

    }

}