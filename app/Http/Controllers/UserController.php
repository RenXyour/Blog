<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        // Mendapatkan informasi pengguna yang sedang login
        $user = Auth::user();

        // Tampilkan view profile dengan data pengguna
        return view('profile', compact('user'));
    }
}
