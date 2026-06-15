<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $user = User::with(['profile', 'skills', 'projects', 'experiences', 'contacts'])->first();

    if (!$user) {
        $user = new User();
        $user->name = "Fauzan";
    }

    return view('home', compact('user'));
});


Route::redirect('/login', '/admin');