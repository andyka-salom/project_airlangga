<?php

namespace App\Http\Controllers;

use App\Models\profilpenyedia_jasa;
use App\Models\Jasa;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfilpenyediaJasaController extends Controller
{
    public function showForm()
    {
        $jasas = Jasa::all();
        return view('cust.daftarpenyediajasa', ['jasas' => $jasas]);
    }

    public function submitForm(Request $request)
    {
      
        
        $data = $request->validate([
            'id_jasa' => 'required|exists:jasas,id_jasa',
            'nama_toko' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
            'address' => 'required|string|max:255',
            'description' => 'required|string',
            'no_rek' => 'nullable|string|max:255',
            'Harga' => 'required|numeric',
        ]);
    
        // Handle file upload and get the file path
       
        $gambar = $request->photo;
        $namaFile = $gambar->getClientOriginalName();
        
        $profilPenyediaJasa = new profilpenyedia_jasa();
        $profilPenyediaJasa->id_user = Auth::user()->id;
        $profilPenyediaJasa->id_jasa = $data['id_jasa'];
        $profilPenyediaJasa->nama_toko = $data['nama_toko'];
        $profilPenyediaJasa->address = $data['address'];
        $profilPenyediaJasa->description = $data['description'];
        $profilPenyediaJasa->no_rek = $data['no_rek'];
        $profilPenyediaJasa->Harga = $data['Harga'];
        $profilPenyediaJasa->status = 'daftar';
        
        // Generate a new file name with the store name
        $newNamaFile = $profilPenyediaJasa->nama_toko . '_' . $namaFile;
        
        // Move the photo to the specified directory with the new file name
        $gambar->move(public_path().'/penyediaImages', $newNamaFile);
        $profilPenyediaJasa->photo = $newNamaFile;
        
        $profilPenyediaJasa->save();
        
    
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
    
    //admin
    public function index()
    {
        $penyediaJasas = profilpenyedia_jasa::where('status', 'approved')->get();

        return view('admin.daftarpenyedia', compact('penyediaJasas'));
    }

    public function nonaktifkan($id)
    {
        $penyediaJasa = profilpenyedia_jasa::find($id);
        $penyediaJasa->status = 'pending';
        $penyediaJasa->save();

        return redirect()->route('admin.daftarpenyedia')->with('success', 'Penyedia Jasa dinonaktifkan.');
    }
    public function daftarPendaftar()
{
    $pendaftarPenyediaJasas = profilpenyedia_jasa::whereIn('status', ['daftar', 'pending'])->get();

    return view('admin.daftarpendaftar', compact('pendaftarPenyediaJasas'));
}
public function ubahStatus($id, $status)
    {
        $validStatus = ['pending', 'approved'];

        if (!in_array($status, $validStatus)) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        $penyediaJasa = profilpenyedia_jasa::find($id);
        $penyediaJasa->status = $status;
        $penyediaJasa->save();

        return redirect()->route('admin.daftarpendaftar')->with('success', 'Status Pendaftar diubah.');
    }
}
