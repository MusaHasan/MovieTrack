<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use DB;
use App\Http\Resources\WishList;

class WishlistController extends Controller
{
  public function wishlist()
  { 
   
    return view('user.wishlist');
  }
  public function wishlistapi()
  { 
    
    $wishListItems=DB::table('articles')
    ->join ('users','users.id','articles.user_id')
    ->where('users.id',Auth::user()->id)
    ->where('articles.wishAdded','=',1)
    ->select('articles.*')
    ->get();
     return $wishListItems;
  }
}
