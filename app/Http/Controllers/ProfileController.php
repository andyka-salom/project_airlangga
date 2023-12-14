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
            $serviceProviders = profilpenyedia_jasa::with(['reviews.user' => function ($query) {
                $query->select(['id', 'name', 'photo']);
            }])->where('id_user', $user->id)->get();
        }
        if ($user->role !== 'service_provider') {
            return view('profile', compact('user'));
        }
    
        return view('profile', compact('user', 'serviceProviders'));
    }

    public function update(Request $request)
{
    $user = Auth::user();


    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'address' => 'nullable|string|max:255',
        'password' => 'nullable|string|min:8',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
    ]);

    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->address = $request->input('address');

    if ($request->has('password')) {
        $user->password = bcrypt($request->input('password'));
    }


    if ($request->hasFile('photo')) {
        $photoFileName = time() . '_' . $request->file('photo')->getClientOriginalName();

        $request->file('photo')->move(public_path().'/jasaImages', $photoFileName);

        $user->photo = $photoFileName;
    }

    $user->save();

    return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui.');
}

}
