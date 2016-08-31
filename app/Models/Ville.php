<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $table = "ville";
    protected $primaryKey = "ville_id";
    protected $fillable = ["libelle", "pays_id"];
    public $timestamps = false;
}
