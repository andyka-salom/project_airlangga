<?php

// app/Http/Controllers/ChatifyController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Chatify\Facades\ChatifyMessenger as Chatify;
use Chatify\Http\Models\Favorite;

class ChatifyController extends Controller
{
    public function showRoom($id_user)
    {
        // Mengambil informasi user berdasarkan ID
        $user = Chatify::getUserInfo($id_user);

        // Jika user tidak ditemukan, redirect atau berikan respons sesuai kebutuhan
        if (!$user) {
            abort(404, 'User not found');
        }

        // Mengambil data pesan
        $messages = Chatify::getMessages($id_user);

        // Mengambil daftar kontak favorit
        $favorites = Favorite::where('user_id', auth()->id())->get();

        // Menampilkan view room chat dengan data yang diperlukan
        return view('chatify', compact('user', 'messages', 'favorites'));
    }

    // Method untuk mengirim pesan
    public function sendMessage(Request $request)
    {
        $response = Chatify::newMessage($request);

        // Jika pesan berhasil dikirim, kirim respon JSON yang sesuai
        if ($response['status'] === 1) {
            return response()->json(['status' => 'success']);
        }

        // Jika terjadi kesalahan, kirim respon JSON dengan pesan kesalahan
        return response()->json(['status' => 'error', 'message' => $response['message']]);
    }
}
