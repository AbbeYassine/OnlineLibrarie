<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    protected $table = "auteur";
    protected $primaryKey = "auteur_id";
    protected $fillable = ["first_name", "last_name", "email"];
    public $timestamps = false;
}
