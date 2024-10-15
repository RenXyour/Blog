<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        // Validasi dan update logika di sini
        // Misalnya:
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            // Validasi lainnya
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        // Update atribut lainnya jika perlu
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}