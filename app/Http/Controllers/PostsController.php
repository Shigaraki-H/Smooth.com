<?php

namespace App\Http\Controllers;

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

    public function post(){
        $postLists = \DB::table('posts')->get();
        return view('posts.index',['postLists' => $postLists]);
    }
}
