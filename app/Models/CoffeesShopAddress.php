<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoffeesShopAddress extends Model
{
  protected $table = 'coffees_shop_address';

  protected $fillable = [ 'coffees_shop_id', 'address','latitude', 'longitude','created_at' ,'updated_at' ];
}
