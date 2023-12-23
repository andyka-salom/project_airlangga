<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProfilPenyedia_Jasa;
use App\Models\Review;

class ResumeController extends Controller
{
    public function showResume($user, $providerId)
    {
        $profilPenyediaJasa = ProfilPenyedia_Jasa::findOrFail($providerId);
        $user = User::findOrFail($user);
        $reviews = Review::where('provider_id', $providerId)->orderByDesc('created_at')->take(5)->get();

        return view('resume', compact('user', 'profilPenyediaJasa', 'reviews'));
    }
}
