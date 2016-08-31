<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    protected $table = "panier";
    protected $primaryKey = "panier_id";
    protected $fillable = ["user_id", "livre_id", "Quantite"];
    public $timestamps = false;
}
