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
        $postLists = Posts::latest('updated_at')->get();
        $userLists = Users::get();
        return view('follows.followList',['userLists'=>$userLists,'postLists'=>$postLists]);
    }
    
    public function followerList(){
        $postLists = Posts::latest('updated_at')->get();
        $userLists = Users::get();
        return view('follows.followerList',['postLists'=>$postLists],['userLists'=>$userLists]);
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
