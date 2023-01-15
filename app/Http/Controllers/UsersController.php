<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        $userLists = \DB::table('users')->get();
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

    public function updateProfile(Request $request){
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


        if($rePassword == $rePassConfi && !(empty($rePassConfi))){

            $rePassConfi = bcrypt($rePassConfi);

            \DB::table('users')->where('id',$id)->update(["password"=>$rePassConfi]);

            return redirect('/profile');
        }elseif(!(empty($reUsername))){
            \DB::table('users')->where('id',$id)->update(["username"=>$reUsername]);
            return redirect('/profile');
        }elseif(!(empty($reUsername)) && !(empty($reMail))){
            \DB::table('users')->where('id',$id)->update(["username"=>$reUsername,"mail"=>$reMail]);
            return redirect('/profile');
        }elseif(!(empty($reUsername)) && !(empty($reMail)) && !(empty($reBio))){
            \DB::table('users')->where('id',$id)->update(["username"=>$reUsername,"mail"=>$reMail,"bio"=>$reBio]);
            return redirect('/profile');
        }elseif(!(empty($reUsername)) && !(empty($reMail)) && !(empty($reBio)) && !(empty($reIcon))){
            \DB::table('users')->where('id',$id)->update(["username"=>$reUsername,"mail"=>$reMail,"bio"=>$reBio,"images"=>$reIcon]);
            return redirect('/profile');
        }elseif(!(empty($reMail))){
            \DB::table('users')->where('id',$id)->update(["mail"=>$reMail]);
            return redirect('/profile');
        }elseif(!(empty($reMail)) && !(empty($reBio))){
            \DB::table('users')->where('id',$id)->update(["mail"=>$reMail,"bio"=>$reBio]);
            return redirect('/profile');
        }elseif(!(empty($reMail)) && !(empty($reBio)) && !(empty($reIcon))){
            \DB::table('users')->where('id',$id)->update(["mail"=>$reMail,"bio"=>$reBio,"images"=>$reIcon]);
            return redirect('/profile');
        }elseif(!(empty($reBio))){
            \DB::table('users')->where('id',$id)->update(["bio"=>$reBio]);
            return redirect('/profile');
        }elseif(!(empty($reBio)) && !(empty($reIcon))){
            \DB::table('users')->where('id',$id)->update(["bio"=>$reBio,"images"=>$reIcon]);
            return redirect('/profile');
        }else{
            return view('users.profile');
        }


    }
}
