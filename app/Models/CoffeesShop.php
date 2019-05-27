<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoffeesShop extends Model
{
  protected $table = 'coffees_shop';

  protected $fillable = [ 'user_id', 'name', 'logo', 'description', 'img', 'thumbnail', 'created_at' ,'updated_at' ];
}
