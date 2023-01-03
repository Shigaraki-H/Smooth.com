<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(){
        $postLists = \DB::table('posts')->get();
        $userLists = \DB::table('users')->get();
        $userid = \DB::table('users')->get('id');
        return view('posts.index',['postLists' => $postLists,'userLists' => $userLists,'userid'=>$userid]);
    }

    public function post(Request $request){

        $id = auth()->id(); 
        
        $userLists = \DB::table('users')->get();
        $userid = \DB::table('users')->get('id');
        
        $postcomment = $request->input("postcomment");
        if($postcomment != ""){
            \DB::table('posts')->insert([
                'user_id' => $id,
                'post' => $postcomment
            ]);

        }else{

        }
        
        $postLists = \DB::table('posts')->get();
        return view('posts.index',['postLists' => $postLists,'userLists' => $userLists,'userid'=>$userid]);
    }

    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }
}
