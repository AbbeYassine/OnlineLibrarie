<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{
    protected $table = "langue";
    protected $primaryKey = "langue_id";
    protected $fillable = ["libelle"];
    public $timestamps = false;
}
