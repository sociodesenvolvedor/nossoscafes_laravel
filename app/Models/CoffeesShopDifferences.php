<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoffeesShopDifferences extends Model
{
  protected $table = 'coffees_shop_differences';

  protected $fillable = [ 'coffees_shop_id', 'icon', 'title', 'description', 'link', 'created_at' ,'updated_at' ];
}
