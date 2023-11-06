<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilCustomer extends Controller
{
    public function show()
    {
        // Logika untuk menampilkan halaman profil pengguna
        return view('profil-customer.index-profil'); // Mengembalikan view 'profile.blade.php'
    }
}
