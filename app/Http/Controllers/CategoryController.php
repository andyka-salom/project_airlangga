<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\jasa;
use App\Models\profilpenyedia_jasa;
use Illuminate\Support\Facades\Storage;



class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('cust.category', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::find($id);
    
        if (!$category) {
            return redirect()->route('category.index')->with('error', 'Category not found.');
        }
    
        $jasas = $category->jasas;
    
        return view('cust.categoryshow', compact('category', 'jasas'));
    }
    
    public function showjasa($id_jasa)
    {
        $profilPenyediaJasas = profilpenyedia_jasa::where('id_jasa', $id_jasa)->get();
    
        
        return view('cust.categoryshow-penyedia', compact('profilPenyediaJasas'));
    }
    
    //for admin
    public function indexAdmin()
    {
        $categories = Category::all();
        return view('admin.kategori.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

        public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'description' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan validasi file sesuai kebutuhan
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->slug = $request->input('name');

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $path = $image->store('category_photos', 'public'); 
            $category->photo = $path;
        }

        $category->save();

        return redirect()->route('Admincategory')->with('success', 'Kategori berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.kategori.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
            'description' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');

        if ($request->hasFile('photo')) {
        
            if ($category->photo) {
                Storage::disk('public')->delete($category->photo);
            }

            $image = $request->file('photo');
            $path = $image->store('category_photos', 'public'); // Simpan foto ke direktori 'public/category_photos'
            $category->photo = $path;
        }

        $category->save();

        return redirect()->route('Admincategory')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        // Hapus foto jika ada
        // if ($category->photo) {
        //     Storage::disk('public')->delete($category->photo);
        // }

        $category->delete();

        return redirect()->route('Admincategory')->with('success', 'Kategori berhasil dihapus.');
    }
}

