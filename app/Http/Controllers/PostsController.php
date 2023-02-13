<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Users;
use App\Posts;
use App\Follows;

class PostsController extends Controller
{
    //
    public function index(){
        $postLists = Posts::get();
        $userLists = Users::get(); 
        return view('posts.index',['postLists' => $postLists,'userLists' => $userLists]);
    }

    public function post(Request $request){

        $id = auth()->id(); 
        
        $userLists = \DB::table('users')->get();
        $userid = \DB::table('users')->get('id');
        $postLists = \DB::table('posts')->get();
        
        $postcomment = $request->input("postcomment");
        if($postcomment != ""){
            \DB::table('posts')->insert([
                'user_id' => $id,
                'post' => $postcomment
            ]);

        }else{

        }

        return redirect()->route('top')->with(['postLists' => $postLists,'userLists' => $userLists,'userid'=>$userid]);
    }


    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }
}
