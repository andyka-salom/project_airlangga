<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\jasa;
use App\Models\profilpenyedia_jasa;
use Illuminate\Support\Facades\Storage;



class CategoryController extends Controller
{
    public function welcome()
    {
        $categories = Category::all();
        return view('welcome', compact('categories'));
    }

    public function home()
    {
        $categories = Category::all();
        return view('welcome', compact('categories'));
    }

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
        $profilPenyediaJasas = profilpenyedia_jasa::where('id_jasa', $id_jasa)
            ->where('status', 'approved')
            ->get();
    
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
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambar = $request->photo;
        $namaFile = $gambar->getClientOriginalName();
        
        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->slug = $request->input('name');
        
        // Generate a new file name with the category name
        $newNamaFile = $category->name. '_' . $namaFile;
        
        // Simpan foto dengan nama file baru
        $gambar->move(public_path().'/kategoriImages', $newNamaFile);
        $category->photo = $newNamaFile;
        
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
        $awal = $category->photo;
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->photo = $awal;

        $request->photo->move(public_path().'/kategoriImages', $awal);
        $category->save();

        return redirect()->route('Admincategory')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $category = Category::findorfail($id);

        $file = public_path('/kategoriImages/').$category->photo;

        if ($category->jasas()->count() > 0) {
            return redirect()->route('Admincategory')->with('error', 'Kategori tidak dapat dihapus karena masih memiliki jasa terkait.');
        }
        

        //cek ada file nya apa ngga
        if (file_exists($file)){
            @unlink($file);
        }

        
        $category->delete();
        return redirect()->route('Admincategory')->with('success', 'Kategori berhasil dihapus.');
    }
}

