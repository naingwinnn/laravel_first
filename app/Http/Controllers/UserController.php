<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function assignment()
    {
    $user = User::with('profile')->find(3);
    dd($user->profile->bio);
    }
}
