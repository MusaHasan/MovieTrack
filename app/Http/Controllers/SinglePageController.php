<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comments;
use App\UserDetails;

use DB;
use Illuminate\Support\Facades\Auth;



class SinglePageController extends Controller
{
    public function show($id){
     return view('user.singlePage',compact('id'));
    }
    public function showapi($id){
    $details=DB::table('articles')
    ->join ('users','users.id','articles.user_id')
    ->where('articles.movie_id','=',$id)
    ->select('articles.*','users.name')
    ->get();
    return $details;
    }
    public function commentsapi($id){
        $details=DB::table('comments')
        // ->where('comments.movie_id','=',$id)
        ->leftjoin ('user_details','user_details.user_id','comments.user_id')
        // ->rightjoin ('user_details','user_details.user_id','=','comments.user_id')
        // ->select('comments.*')
        ->where('comments.movie_id','=',$id)

        // ->select('comments.*','users.name','user_details.image')
        // ->select('comments.*')
        ->get();
        return $details;
        }

        



}
