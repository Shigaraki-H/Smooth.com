<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Users;
use App\Posts;
use App\Follows;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }

    // フォロー
    public function follow($id)
    {
	//users()はユーザーテーブルを指している？
        //$follower = \DB::table('users')->get();  <-間違えたやつ
	$follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($id);
        
        
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($id);
            return back();
        }
    }

    // フォロー解除
    public function unfollow($id)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($id);
            return back();
        }
    }
}
