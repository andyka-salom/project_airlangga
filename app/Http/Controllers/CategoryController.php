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
        $data =[
            'name'=> $request->nama_categori,
            'slug'=> $request->slug,
            'description'=> $request->desc,
            'photo'=> $request->image,
        ];

        // if($request->hasFile('image')){
        //     $request->file('image')->move('images/', $request->file('image'->getClientOriginalName()));
        // }
        
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        Category::create($data);
        return redirect()->to('Admincategory')->with('message','Kategori berhasil di tambahkan');

    }

    public function edit(string $id)
    {
        $data = Category::where('id',$id)->first();
        return view('admin.kategori.edit')-> with('data',$data);
    }
    
    public function update(Request $request, string $id)
    {
        $data =[
            'name'=> $request->nama_categori,
            'slug'=> $request->slug,
            'description'=> $request->desc,
            'photo'=> $request->image,
        ];
    
        // if($request->hasFile('image')) {
        //     $imageName = time().'.'.$request->image->extension();  
        //     $request->image->move(public_path('images'), $imageName);
        //     $data->photo = 'images/'.$imageName;
        // }
    
        // $data->save();
        // $imageName = time().'.'.$request->image->extension();  
        // $request->image->move(public_path('images'), $imageName);

        Category::where('id',$id)->update($data);
        return redirect()->to('Admincategory')->with('message','Kategori berhasil di Update');
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
    
    public function destroy(string $id)
    {
        Category::where('id',$id)->delete();
        return redirect()->to('Admincategory')->with('message','Kategori berhasil di Hapus');
    }
    
}

