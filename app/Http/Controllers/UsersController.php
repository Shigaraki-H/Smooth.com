<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Users;
use App\Posts;
use App\Follows;

use App\Http\Requests\ValidationCheckUpdateProfile;
use Illuminate\Support\Facades\Storage;


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


        return view('users.search',['userLists' => $userLists,'keyword'=>$keyword]);
    }

    public function updateProfile(ValidationCheckUpdateProfile $request){
        $id = Auth::user()->id;
        $reUsername = $request->input('username');
        $reMail = $request->input('mail');
        $rePassword = $request->input('password');
        $rePassConfi = $request->input('password_confirmation');
        $reBio = $request->input('bio');
        $reIcon = $request->input('images');

        // 画像ディレクトリ名
        $dir = '/images';

        if(is_null($request->images)){
            //画像はデフォルトのまま
            $reIcon = Auth::user()->images;
        }else{
            $reIcon = $request->images->getClientOriginalName();
            $request->file('images')->storeAs('public/' . $dir,$reIcon);
        }

        if($rePassword == $rePassConfi && !(empty($rePassConfi))){

            $request->validate([
                'password' => 'string|min:8|max:20|confirmed',
            ]);
            

            $rePassConfi = bcrypt($rePassConfi);

            Users::where('id',$id)->update(["username"=>$reUsername,"mail"=>$reMail,"password"=>$rePassConfi,"bio"=>$reBio,"images"=>$reIcon]);

            return redirect('/top');
        }elseif(is_null($rePassword)){
            Users::where('id',$id)->update(["username"=>$reUsername,"mail"=>$reMail,"bio"=>$reBio,"images"=>$reIcon]);
            return redirect('/top');
        }
        else{
            return redirect('/profile');
        }

        return redirect('/top');
    }
}
