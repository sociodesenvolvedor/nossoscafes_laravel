<?php
// Name Space
namespace App\Http\Controllers\Api;

// Core
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Validator;
use Hash;

// Models
use App\Models\CoffeesShop;

class CoffesShopController extends Controller
{
  public function get()
  {
    $coffeesShop = CoffeesShop::orderBy('id')->get();
    if(count($coffeesShop) == 0) {return Response::json(array( 'error' => true, 'msg' => 'Not Found Data'),404); }
    return Response::json(array( 'error' => false, 'msg' => 'Lista', 'data' => $coffeesShop),200);
  }
}
