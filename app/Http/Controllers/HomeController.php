<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Projects;
use App\Models\Skills;
use App\Models\Experiences;
use App\Models\Contacts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
        $user = User::with(['profile', 'skills', 'experiences', 'contacts', 'projects'])->first();

        
        if (!$user) {
            return "Data kosong. Jalankan 'php artisan db:seed' terlebih dahulu di terminal.";
        }

        return view('home', compact('user'));
    }
}