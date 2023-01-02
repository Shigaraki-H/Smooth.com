<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
