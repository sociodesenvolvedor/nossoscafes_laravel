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
use App\Models\CoffeesShopAddress;
use App\Models\CoffeesShopDifferences;
use App\Models\CoffeesShopRating;

class CoffesShopController extends Controller
{
  //Pega tudo dos cafés shop
  public function get()
  {
    $data = [];
    $totalRating = 0;
    $coffeesShop = CoffeesShop::orderBy('id')->get();
    foreach($coffeesShop as $c)
    {
      $rating = CoffeesShopRating::where('coffees_shop_id',$c->id)->get();
      foreach($rating as $ts)
      {
        $totalRating += $ts->food + $ts->services +  $ts->price + $ts->place;
      }

      $new =
      [
        "id" =>  $c->id,
        "user_id" => $c->user_id,
        "name" => $c->name,
        "logo" => $c->logo,
        "description" => $c->description,
        "imgs" =>  $c->imgs,
        "thumbnail"=> $c->thumbnail,
        "banner" =>  json_decode($c->imgs),
        "address" => CoffeesShopAddress::where('coffees_shop_id',$c->id)->get(),
        "differences" => CoffeesShopDifferences::where('coffees_shop_id',$c->id)->get(),
        "rating" => CoffeesShopRating::where('coffees_shop_id',$c->id)->get(),
        "totalRatingCounts" => count(CoffeesShopRating::where('coffees_shop_id',$c->id)->get()),
        "totalRating" => $totalRating,
        "totalRatingGeral" => $totalRating / ( count(CoffeesShopRating::where('coffees_shop_id',$c->id)->get()) * 4 ),
        "created_at" => $c->created_at,
        "updated_at" => $c->updated_at,
      ];
      array_push($data, $new);
    }
    if(count($coffeesShop) == 0) {return Response::json(array( 'error' => true, 'msg' => 'Not Found Data'),404); }
    return Response::json(array( 'error' => false, 'msg' => 'Lista das Caféterias Rapá', 'data' => $data),200);
  }

  // public function get()
  // {
  //   $data = [];
  //   $gallery = AppGallery::orderBy('order')->get();
  //   if(count($gallery) == 0) {return Response::json(array( 'error' => true, 'msg' => 'Not Found Data'),404); }
  //   foreach($gallery as $p)
  //   {
  //     $new =
  //     [
  //       "id" => $p->id,
  //       "title" => $p->title,
  //       "description" => $p->description,
  //       "thumbnail" => $p->thumbnail,
  //       "imgs" => $p->imgs,
  //       "order" => $p->order,
  //       "visibility" => $p->visibility,
  //       "count_likes" => count(AppGalleryLikes::where('gallery_id',$p->id)->get()),
  //       "count_comments" => count(AppGalleryComments::where('gallery_id',$p->id)->where('visibility',1)->get()),
  //       "likes" => AppGalleryLikes::where('gallery_id',$p->id)->get(),
  //       "comments" => AppGalleryComments::where('gallery_id',$p->id)->where('visibility',1)->get(),
  //       "created_at" => $p->created_at,
  //       "updated_at" => $p->updated_at,
  //     ];
  //     array_push($data, $new);
  //   }
  //   return Response::json(array( 'error' => false, 'msg' => 'Lista de Galeria', 'data' => $data),200);
  // }
}
