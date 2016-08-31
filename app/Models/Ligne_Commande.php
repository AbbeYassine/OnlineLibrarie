<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ligne_Commande extends Model
{
    protected $table = "ligne_commande";
    protected $primaryKey = "ligne_commande_id";
    protected $fillable = ["quantite", "commande_id", "livre_id"];
    public $timestamps = false;
}
