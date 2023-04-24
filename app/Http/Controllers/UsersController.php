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
        $postLists = Posts::latest('updated_at')->where('user_id', $id)->get();
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

        $auth_name = Auth::user()->username;

        $keyword = $request->input("inputkeyword");
        if($request->has("inputkeyword") && $keyword != ""){
            $userLists = \DB::table('users')->where('username', 'like',"%".$keyword."%")->get();
            
        }else{
            $userLists = \DB::table('users')
            ->where('username', "!=",$auth_name)->get();
        }


        return view('users.search',['userLists' => $userLists]);
    }

    public function updateProfile(ValidationCheckUpdateProfile $request){
        $id = Auth::user()->id;
        $reUsername = $request->input('username');
        $reMail = $request->input('mail');
        $rePassword = $request->input('password');
        $rePassConfi = $request->input('password_confirmation');
        $reBio = $request->input('bio');
        $reIcon = $request->input('images');

        if($reUsername){
            \DB::table('users')->where('id',$id)->update(["username"=>$reUsername]);
            
        }

        if($reMail){
            \DB::table('users')->where('id',$id)->update(["mail"=>$reMail]);
        }

        if($rePassword){
            $rePassword = bcrypt($rePassword);
            \DB::table('users')->where('id',$id)->update(["password"=>$rePassword]);
        }

        if($reBio){
            \DB::table('users')->where('id',$id)->update(["bio"=>$reBio]);
        }

        if($reIcon){
            $reIcon = $request->image->getClientOriginalName();;
            \DB::table('users')->where('id',$id)->update(["images"=>$reIcon]);

        }

        return redirect('/top');
    }
}
