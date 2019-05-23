<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoffeesShopRating extends Model
{
  protected $table = 'coffees_shop_rating';

  protected $fillable = [ 'coffees_shop_id','user_id', 'food', 'services', 'price', 'place', 'created_at' ,'updated_at' ];
}
