<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\jasa;
use App\Models\profilpenyedia_jasa;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('cust.category', compact('categories'));
    }

    public function show($id)
    {
        $selectedCategory = Category::find($id);
        $jasas = $selectedCategory->jasas;
        return view('cust.categoryshow', compact('selectedCategory', 'jasas'));
    }
    public function showjasa($id_jasa)
    {
        $profilPenyediaJasas = profilpenyedia_jasa::where('id_jasa', $id_jasa)->get();
    
        if ($profilPenyediaJasas->isEmpty()) {
            return redirect()->route('jasa.index')->with('error', 'Profil penyedia jasa tidak ditemukan.');
        }
    
        return view('cust.categoryshow-penyedia', compact('profilPenyediaJasas'));
    }
    

    
}

