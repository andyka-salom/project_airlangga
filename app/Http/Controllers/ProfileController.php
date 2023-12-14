<?php
// app/Http/Controllers/ProfilController.php

namespace App\Http\Controllers;
use App\Models\profilpenyedia_jasa;
use App\Models\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\user;


class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if ($user->role === 'service_provider') {
            // Fetch the service provider profiles for the current user with reviews
            $serviceProviders = profilpenyedia_jasa::with(['reviews' => function ($query) {
                $query->latest()->take(3);
            }])->where('id_user', $user->id)->get();
        }
        return view('profile', compact('user', 'serviceProviders'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'address' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        // Update user information
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');

        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $users = $user;
        $awal = $users->photo;
        $user->photo = $awal;

        $request->photo->move(public_path().'/kategoriImages', $awal);

        $user->save();

        return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui.');
    }
}
