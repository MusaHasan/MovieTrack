<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\UserDetails;
use DB;


class UserController extends Controller
{

    public $successStatus = 200;


    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }


    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);


        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }


        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;


        return response()->json(['success'=>$success], $this->successStatus);
    }


    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

public function home(){
    $user_id= Auth::user()->id;
    $check=DB::table('articles')
    ->where ('articles.user_id','=',$user_id)
    ->get();
    // return $check;

    // $interaction=Article::all('user_review');
    // return $interaction;
    return view('user/home',compact('check'));
}

public function profileid(){  
    $details= User::with('user_details')->find(Auth::user()->id);
//    return $details;
    return view('user/profile',compact('details'));
}



public function profile_edit(){
    return view('user/profileedit');
}

public function profile_update(Request $request){
        $user= Auth::user()->id;
        $imageFile = $request->file('image'); 
        $imageName = $imageFile->getClientOriginalName();
        $uploadPath = '../public/images/';
        $imageFile->move($uploadPath, $imageName);
        $imageFullPath = '/images/'.$imageName;
        $userdetail = new UserDetails();
        $userdetail->user_id=$user;
        $userdetail->image = $imageFullPath;
        $userdetail->name = $request->name;
        $userdetail->email = $request->email;
        $userdetail->phone = $request->phone;
        $userdetail->about = $request->about;
        $userdetail->save();
        return view('user.profile');

}

}
