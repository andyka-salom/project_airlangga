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
        $data = $request->validate([
            'photo' => 'required',
            'address' => 'required',
        ]);

        ProfilCustomer::create([
            'user_id' => $user->id,
            'photo' => $data['photo'],
            'address' => $data['address'],
        ]);

        return redirect()->route('cust.profil-customer.show')
            ->with('success', 'Profil customer berhasil dibuat.');
    }

    public function edit()
    {
        $user = Auth::user();
        $profilCustomer = ProfilCustomer::where('user_id', $user->id)->first();

        return view('cust.profil-customer.edit', compact('profilCustomer'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'photo' => 'required',
            'address' => 'required',
        ]);

        ProfilCustomer::where('user_id', $user->id)->update([
            'photo' => $data['photo'],
            'address' => $data['address'],
        ]);

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

    public function destroy()
{
    $user = Auth::user();

    // Hapus data dari tabel profilcustomers jika ada
    $profilCustomer = ProfilCustomer::where('user_id', $user->id)->first();
    if ($profilCustomer) {
        $profilCustomer->delete();
    }

    // Hapus data dari tabel users
    $user->delete();

    return redirect()->route('home')->with('success', 'Akun berhasil dihapus.');
}

}
