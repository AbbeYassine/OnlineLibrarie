<?php
namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Client extends Model implements Authenticatable
{



    use \Illuminate\Auth\Authenticatable;

    protected $table = "client";
    protected $primaryKey = "client_id";
    protected $fillable = ["email", "first_name", "last_name", "company", "street", "zip", "phone", "ville_id", "active", "val_activation","password","confirmed","confirmation_code","avatar"];
    public $timestamps = false;


}
