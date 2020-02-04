<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use App\User;
use App\Article;
use App\Comments;
use Auth;


class ReviewController extends Controller
{

public function show(){
    return view('user.review');
}
public function check(){
    $user=Auth::user()->id;
    $check=DB::table('articles')
    ->where ('articles.user_id','=',$user)
    ->get();
    return $check;
}




public function store(Request $request)
{
    $user= Auth::user()->id;
    $article=new Article();
    $article->user_id=$user;
    $article->comment=$request->comment;
    $article->movieName=$request->movieName;
    $article->wishAdded=$request->wishAdded;
    $article->rating=$request->rating;
    $article->movie_id=$request->movieId;
    $article->save();

    $comment=new Comments();
    $comment->user_id=$user;
    $comment->movie_id=$request->movieId;
    $comment->movieName=$request->movieName;
    $comment->comment=$request->comment;
    $comment->save();



    return view ('user.movieDetail');
}

    public function allmovieapi(){

        $user= Auth::user()->id;
        // return view('user/profile',compact('details'));
        $details=DB::table('articles')
        // ->where('comments.user_id','=',$user)
        // ->get()
        ->where ('articles.user_id','=',$user)
        // ->join ('user_details','user_details.user_id','=','comments.user_id')
        // // ->select('comments.*')

        // // ->select('comments.*','users.name','user_details.image')
        // // ->select('comments.*')
        ->get();
        return $details;
        }
}

