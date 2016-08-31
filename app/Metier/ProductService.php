<?php
/**
 * Created by PhpStorm.
 * User: Abbes
 * Date: 27/04/2016
 * Time: 07:09
 */

namespace App\Metier;

use App\Models\Commande;
use App\Models\Commentaire;
use App\Models\Langue;
use App\Models\Ligne_Commande;
use App\Models\Livre;
use App\Models\Panier;
use App\Models\Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductService
{

    public function getProducts()
    {
        return Livre::All();
    }

    public function getProductById($livreId)
    {
        return Livre::Where("livre_id", "=", $livreId)->firstOrFail();
    }

    public function getProductByCategory($name)
    {
        return Livre::where("type_id", "=", $name)
            ->paginate(6);

    }

    public function getProductByName($name)
    {
        return Livre::where("nom", "like", $name . "%")
            ->paginate(6);
    }

    public function getProductByCle($name)
    {
        return Livre::where("nom", "like", $name . "%")
            ->get();
    }

    public function getLivreByPanier($userID)
    {
        return Livre::join("panier", "panier.livre_id", "=", "livre.livre_id")
            ->where("panier.user_id", "=", $userID)
            ->get();
    }

    public function getLivreBySession($panier)
    {
        $livres = array();
        foreach ($panier as $item) {
            $item1 = array();
            $itemLivre = Livre::where("livre_id", "=", $item["id_livre"])
                ->first();
            $itemLivre["Quantite"] = $item["Quantite"];
            $item1["livre"] = $itemLivre;
            array_push($livres, $item1);
        }
        return $livres;
    }

    public function getWishList($userID)
    {
        return Livre::join("favoriteuser", "livre.livre_id", "=", "favoriteuser.livre_id")
            ->where("favoriteuser.user_id", "=", $userID)
            ->get();
    }

    public function storeCommande($userID, $sum)
    {
        $commande = new Commande;
        $commande->date_commande = date('Y-m-d H:i:s');
        $commande->client_id = $userID;
        $commande->total = $sum;
        $commande->save();
        return $commande;
    }

    public function saveLigneCommande($commande_id, $livres)
    {
        foreach ($livres as $livre) {
            $lign = new Ligne_Commande;
            $lign->quantite = $livre->Quantite;
            $lign->commande_id = $commande_id;
            $lign->livre_id = $livre->livre_id;
            $lign->save();
        }
    }

    public function deleteFromPanier($userID)
    {
        Panier::where("user_id", "=", $userID)
            ->delete();
    }

    public function getAllTypes()
    {
        return Type::all();
    }

    public function getAllLang()
    {
        return Langue::all();
    }

    public function createLivre($data, $photo)
    {
        return Livre::create(
            [
                "nom" => $data["nom"],
                "prix" => $data["prix"],
                "quantite_stock" => $data["quantite_stock"],
                "langue_id" => $data["langue_id"],
                "type_id" => $data["type_id"],
                "image" => $photo,
                "isbn" => $data["isbn"],
                "maison_edition" => $data["mais_edi"],
                "date_creation" => date("Y-m-d"),
                "dimension" => $data["dimension"],
                "format" => $data["format"],
                "nb_page" => $data["nb_page"],
                "description" => $data["desc"]

            ]);
    }

    public function getAllBooks()
    {
        return Livre::join("type", "type.type_id", "=", "livre.type_id")
            ->get();
    }

    public function deleteBook($livreID)
    {
        Livre::where("livre_id", "=", $livreID)
            ->delete();
    }

    public function getCommandesByUser($userID)
    {
        return Commande::where("client_id", "=", $userID)
            ->get();
    }

    public function deleteBookFromPanier($livreID, $client_id)
    {

        $panier = Panier::where("user_id", "=", $client_id)
            ->where("livre_id", $livreID)
            ->first();
        Session::put("number", Session::get("number", 0) - $panier["Quantite"]);
        return Panier::where("user_id", "=", $client_id)
            ->where("livre_id", $livreID)
            ->delete();

    }

    public function getNumberBooks()
    {
        return count(Livre::all());
    }

    public function numberLivreByLangue()
    {
        return Livre::join("langue", "langue.langue_id", "=", "livre.langue_id")
            ->select(DB::raw("count(*) as nbLivre , langue.libelle"))
            ->groupBy("langue.langue_id")
            ->get();
    }

    public function numberLivreByType()
    {
        return Livre::join("type", "type.type_id", "=", "livre.type_id")
            ->select(DB::raw("count(*) as nbLivre , type.libelle"))
            ->groupBy("type.type_id")
            ->get();
    }

    public function getBookSold()
    {
        return Ligne_Commande::join("livre", "livre.livre_id", "=", "ligne_commande.livre_id")
            ->join("type", "type.type_id", "=", "livre.type_id")
            ->select(DB::raw("count(*) as nbLivre , livre.nom as nom , type.libelle as libelle, livre.prix as prix"))
            ->groupBy("livre.livre_id")
            ->get();
    }

    public function getLivreByLettre($mot)
    {
        return Livre::where("nom", "LIKE", $mot . "%")->take(10)->select("nom")->get();
    }

    public function getRatingByLivre($livre)
    {
        return Commentaire::where("livre_id", "=", $livre->livre_id)
            ->groupBy("livre_id")
            ->select(DB::raw("SUM(rating)/count(*) as rating"))
            ->first();
    }

    public function getOrderById($commandeID)
    {
        return Commande::join("ligne_commande", "ligne_commande.commande_id", "=", "commande.commande_id")
            ->join("livre", "livre.livre_id", "=", "ligne_commande.livre_id")
            ->where("commande.commande_id", "=", $commandeID)
            ->get();
    }

    public function getBookByLang($idLang)
    {
        return Livre::where("langue_id", "=", $idLang)
            ->paginate(6);
    }

    public function updateLivre($livres)
    {
        foreach ($livres as $livre) {
            $livreDB = Livre::where("livre_id", "=", $livre->livre_id)->first();
            $livreDB->quantite_stock = $livreDB->quantite_stock - $livre->Quantite;
            $livreDB->save();
        }

    }


}