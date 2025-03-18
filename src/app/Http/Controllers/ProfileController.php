<?php

namespace App\Http\Controllers;

use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $liked_courses = '';

        return view('profile', compact(['user', 'liked_courses']));
    }
}
