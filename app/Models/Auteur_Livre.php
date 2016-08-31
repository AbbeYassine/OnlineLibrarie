<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auteur_Livre extends Model
{
    protected $table = "auteur_livre";
    protected $primaryKey = "auteur_livre_id";
    protected $fillable = ["auteur_id", "livre_id"];
    public $timestamps = false;
}
