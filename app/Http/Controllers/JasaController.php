<?php

namespace App\Http\Controllers;
use App\Models\jasa;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JasaController extends Controller
{   
        public function show(jasa $jasa)
        {
            $provider = $jasa->provider;
            return view('jasa.show', compact('jasa', 'provider'));
        }

        public function indexAdmin()
        {
           
            $jasas = Jasa::get();
            // dd($jasas);
            return view('admin.jasa.index', compact('jasas'));
        }

        public function create()
    {
        $cat = Category::get();
        return view('admin.jasa.create',compact('cat'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_jasa' => 'required|unique:jasas',
            'deskripsi_jasa' => 'required',
            'id_categories' => 'required|integer|exists:categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan validasi file sesuai kebutuhan
        ]);

        $gambar = $request->image;
        $namaFile = $gambar->getClientOriginalName();

        $jasas = new jasa();
        $jasas->nama_jasa = $request->input('nama_jasa');
        $jasas->deskripsi_jasa = $request->input('deskripsi_jasa');
        $jasas->id_categories = $request->input('id_categories');
        $jasas->image = $namaFile;
        // $jasas->slug = $request->input('nama_jasa');

        $newNamaFile = $jasas->nama_jasa. '_' . $namaFile;
        
        // Simpan foto dengan nama file baru
        $gambar->move(public_path().'/jasaImages', $newNamaFile);
        $jasas->image = $newNamaFile;

        $jasas->save();
        return redirect()->route('Adminjasa')->with('success', 'Jasa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $cat = Category::get();
        $jasas = Jasa::find($id);
        return view('admin.jasa.edit', compact('jasas','cat'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama_jasa' => 'required|unique:jasas,nama_jasa,' . $id . ',id_jasa',
        'deskripsi_jasa' => 'required',
        'id_categories' => 'required|integer|exists:categories,id',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $jasas = Jasa::find($id);

    if (!$jasas) {
        return redirect()->route('Adminjasa')->with('error', 'Jasa tidak ditemukan.');
    }

    // Simpan nama file gambar baru
    $newImageName = $jasas->image;

    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($jasas->image) {
            $oldImagePath = public_path('jasaImages/' . $jasas->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Simpan gambar baru
        $newImageName = $jasas->nama_jasa . '.' . $request->image->extension();
        $request->image->move(public_path('jasaImages'), $newImageName);
    }

    $jasas->nama_jasa = $request->input('nama_jasa');
    $jasas->deskripsi_jasa = $request->input('deskripsi_jasa');
    $jasas->id_categories = $request->input('id_categories');
    $jasas->image = $newImageName;
    // $jasas->slug = $request->input('nama_jasa');
    $jasas->save();

    return redirect()->route('Adminjasa')->with('success', 'Jasa berhasil diperbarui.');
}

        
    
    public function destroy($id)
    {
        $jasas = jasa::find($id);

        $file = public_path('/jasaImages/').$jasas->image;

        //cek ada file nya apa ngga
        if (file_exists($file)){
            @unlink($file);
        }

        $jasas->delete();
        return redirect()->route('Adminjasa')->with('success', 'Kategori berhasil dihapus.');
    }
}
