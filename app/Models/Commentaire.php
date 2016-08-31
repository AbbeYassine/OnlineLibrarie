<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table = "commentaire";
    protected $primaryKey = "commentaire_id";
    protected $fillable = ["content","rating", "client_id", "livre_id"];
    public $timestamps = false;
}
