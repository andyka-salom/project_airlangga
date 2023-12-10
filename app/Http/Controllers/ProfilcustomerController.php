<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProfilCustomer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfilCustomerController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        $profilCustomer = ProfilCustomer::where('user_id', $user->id)->first();

        if ($profilCustomer) {
            $user = User::where('id', $profilCustomer->user_id)->select('name', 'email')->first();

            return view('cust.profil-customer.show', compact('profilCustomer', 'user'));
        } else {
            return view('cust.profil-customer.create');
        }
    }

    public function create()
    {
        $user = Auth::user();
        $profilCustomer = ProfilCustomer::where('user_id', $user->id)->first();

        if ($profilCustomer) {
            return view('cust.profil-customer.edit', compact('profilCustomer'));
        } else {
            return view('cust.profil-customer.create');
        }
    }

    public function store(Request $request)
    {

        $user = Auth::user();
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan validasi file sesuai kebutuhan
            'address' => 'required',
        ]);

        $gambar = $request->photo;
        $namaFile = $gambar->getClientOriginalName();

        $profilCustomer = new ProfilCustomer();
            $user->id;
            $profilCustomer -> photo=$namaFile;
            $profilCustomer -> $request->input('address');
        
        $newNamaFile = $profilCustomer->id_profilcust. '_' . $namaFile;
        
        // Simpan foto dengan nama file baru
        $gambar->move(public_path().'/profileImages', $newNamaFile);
        $profilCustomer->image = $newNamaFile;

        $profilCustomer->save();
        
        return redirect()->route('cust.profil-customer.show')
            ->with('success', 'Profil customer berhasil dibuat.');
    }

    public function edit()
    {
        $user = Auth::user();
        $profilCustomer = ProfilCustomer::where('user_id', $user->id)->first();

        return view('cust.profil-customer.edit', compact('profilCustomer'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan validasi file sesuai kebutuhan
            'address' => 'required',
        ]);

        $profilCustomer = ProfilCustomer::find($id);
        $user->id;
        $awal = $profilCustomer->photo;
        $profilCustomer->address = $request->input('address');
        $profilCustomer->photo = $awal;

        $request->photo->move(public_path().'/ProfileImages', $awal);
        $profilCustomer->save();

        return redirect()->route('cust.profil-customer.show')
            ->with('success', 'Profil customer berhasil diperbarui.');
    }

    public function editPassword()
    {
        return view('cust.profil-customer.edit-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah.']);
        }

        $user->update(['password' => Hash::make($request->new_password)]);

        return redirect()->route('cust.profil-customer.show')->with('success', 'Password berhasil diperbarui.');
    }

    public function destroy($id)
{
    // Mengambil pengguna yang terautentikasi
    $user = Auth::user();

    // Mencari profil pelanggan berdasarkan ID
    $profilCustomer = ProfilCustomer::find($id);

    // Memeriksa apakah profil pelanggan ditemukan
    if ($profilCustomer) {
        // Mendapatkan jalur lengkap file gambar profil
        $filePath = public_path('/profileImages/') . $profilCustomer->photo;

        // Memeriksa apakah file gambar profil ada
        if (file_exists($filePath)) {
            // Menghapus file gambar profil
            @unlink($filePath);
        }

        // Menghapus rekaman ProfilCustomer dari database
        $profilCustomer->delete();

        // Menghapus pengguna yang terautentikasi
        $user->delete();

        // Alihkan pengguna ke rute 'home' dengan pesan keberhasilan
        return redirect()->route('home')->with('success', 'Akun berhasil dihapus.');
    } else {
        // Alihkan pengguna ke rute 'home' dengan pesan kesalahan jika profil tidak ditemukan
        return redirect()->route('home')->with('error', 'Profil tidak ditemukan.');
    }
}

}
