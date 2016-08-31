<?php
/**
 * Created by PhpStorm.
 * User: Abbes
 * Date: 29/04/2016
 * Time: 18:47
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class FavoriteUser extends Model
{
    protected $table = "favoriteUser";
    protected $primaryKey = "favoriteUser_id";
    protected $fillable = ["user_id", "livre_id"];
    public $timestamps = false;

}