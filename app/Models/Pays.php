<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    protected $table = "pays";
    protected $primaryKey = "pays_id";
    protected $fillable = ["pays"];
    public $timestamps = false ;
}
