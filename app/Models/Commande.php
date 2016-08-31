<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table = "commande";
    protected $primaryKey = "commande_id";
    protected $fillable = ["date_commande", "total", "client_id"];
    public $timestamps = false;
}
