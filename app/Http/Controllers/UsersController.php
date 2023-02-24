<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Users;
use App\Posts;
use App\Follows;

use App\Http\Requests\ValidationCheckUpdateProfile;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    public function otherProfile(Request $request){
        $id = $request->id;
        $postLists = Posts::where('user_id', $id)->get();
        $userLists = Users::where('id',$id)->get();
        return view('users.otherProfile',['postLists' => $postLists,'userLists' => $userLists]);
    }

    public function search(Follows $follower){

        $auth_name = Auth::user()->username;

        $userLists = \DB::table('users')
            ->where('username', "!=",$auth_name)->get();

        return view('users.search',['userLists' => $userLists]);
    }

    public function searchResult(Request $request){

        $keyword = $request->input("inputkeyword");
        if($request->has("inputkeyword") && $keyword != ""){
            $userLists = \DB::table('users')->where('username', 'like',"%".$keyword."%")->get();
            
        }else{
            $userLists = \DB::table('users')->get();
        }


        return view('users.search',['userLists' => $userLists]);
    }

    public function updateProfile(ValidationCheckUpdateProfile $request){
        $id = Auth::user()->id;
        $reUsername = $request->input('inputName');
        $reMail = $request->input('inputEmail');
        $rePassword = $request->input('inputPassword');
        $rePassConfi = $request->input('inputPassConf');
        $reBio = $request->input('inputBio');
        $reIcon = $request->input('image');

        if($request->image){
            $reIcon = $request->image->getClientOriginalName();;
            \DB::table('users')->where('id',$id)->update(["images"=>$reIcon]);

            return redirect('/profile');
        }


    }
}
