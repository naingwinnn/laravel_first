<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function oneToOne()
    {
        $user = User::with('profile')->find(3);
        dd($user->profile->bio);
    }
    public function oneToMany()
    {
        $user = User::with('posts')->find(3);
        $titles = $user->posts->pluck('title');
        dd($titles);
    }
    public function manyToMany()
    {
        $user = User::find(1);
        $likedPosts = $user->likedPosts()->pluck('title');
        dd($likedPosts);
    }
    public function hasOneThrough()
    {
        $user = User::find(1);
        $latestComment = $user->latestCommentThroughPost;
        dd($latestComment->comment);
    }
    public function hasManyThrough()
    {
        $user = User::find(1);
        $comments = $user->commentsThroughPosts;
        $allComments = $comments->pluck('comment');
        dd($allComments);
    }
}
