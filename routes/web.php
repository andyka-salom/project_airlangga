<?php
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilCustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfilpenyediaJasaController;
use App\Http\Controllers\ChatifyController;
use App\Http\Controllers\ResumeController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/profil', [ProfileController::class, 'index'])->name('profil.index');
Route::put('/profil/update', [ProfileController::class, 'update'])->name('profil.update');

    Route::get('/home', [App\Http\Controllers\CategoryController::class, 'home'])->name('home');

    Route::get('/', [CategoryController::class, 'welcome'])->name('welcome');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/chatify/{userId}', [ChatifyController::class, 'showRoom'])->name('chatify.room');

    // Mengirim pesan
    Route::post('/chatify/send-message', [ChatifyController::class, 'sendMessage'])->name('chatify.send-message');

Route::group(['middleware' => ['auth','checkRole:customer,service_provider']], function(){
  
    // Rute untuk menampilkan halaman pemesanan
    Route::get('/order/{providerId}', [OrderController::class,'showOrderForm'])->name('order');
    Route::post('/submit-order', [OrderController::class,'submitOrder'])->name('submit_order');
    Route::get('invoice/{id}', [OrderController::class,'invoice']);

    //history order
    Route::get('/order-history', [OrderController::class, 'orderHistory'])->name('order.history');
    Route::get('/review/{order_id}', [OrderController::class, 'review'])->name('review');
    Route::get('/review/{order_id}', [OrderController::class, 'review'])->name('review');
    Route::post('/submit-review/{order_id}', [ReviewController::class, 'submitReview'])->name('submit.review');
    //daftar penyedia
    Route::get('/become-service-provider', [ProfilpenyediaJasaController::class, 'showForm'])->name('show.provider.form');
    Route::post('/submit-service-provider', [ProfilpenyediaJasaController::class, 'submitForm'])->name('submit.provider');
    //kategori
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index.cus');
    Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/jasa/{jasaId}', [CategoryController::class, 'showjasa'])->name('jasa.show');
    Route::get('/cust/categoryshow', [CategoryController::class, 'show'])->name('cust.categoryshow');
    
   
Route::get('/resume/{user}/{providerId}', [ResumeController::class, 'showResume'])->name('resume');
});
   
Route::group(['middleware' => ['auth','checkRole:service_provider']], function(){
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::patch('/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');    
});

Route::group(['middleware' => ['auth','checkRole:admin']], function(){
    Route::get('/penyediajasa', [ProfilpenyediaJasaController::class, 'index'])->name('admin.daftarpenyedia');
    Route::put('/penyediajasa/{id}/nonaktifkan', [ProfilpenyediaJasaController::class, 'nonaktifkan'])->name('penyediajasa.nonaktifkan');
    
    //daftar pendaftar penyedia
    Route::get('/pendaftar', [ProfilpenyediaJasaController::class, 'daftarPendaftar'])->name('admin.daftarpendaftar');
    Route::put('/pendaftar/{id}/ubahstatus/{status}', [ProfilpenyediaJasaController::class, 'ubahStatus'])->name('pendaftar.ubahstatus');

    //category admin
    Route::get('Admincategory', [CategoryController::class, 'indexAdmin'])->name('category.index');
    Route::get('Admincategory/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('Admincategory', [CategoryController::class, 'store'])->name('category.store');
    Route::get('Admincategory/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('Admincategory/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('Admincategory/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

 
    Route::get('/admin/categories', [CategoryController::class, 'indexAdmin'])->name('Admincategory');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // Route::get('/jasa', [JasaController::class, 'index'])->name('jasa.index');
    Route::get('/admin/jasa', [JasaController::class, 'indexAdmin'])->name('Adminjasa');
    Route::get('/admin/jasa/create', [JasaController::class, 'create'])->name('jasa.create');
    Route::post('/admin/jasa', [JasaController::class, 'store'])->name('jasa.store');
    Route::get('/admin/jasa/{id}/edit', [JasaController::class, 'edit'])->name('jasa.edit');
    Route::put('/admin/jasa/{id}', [JasaController::class, 'update'])->name('jasa.update');
    Route::delete('/admin/jasa/{id}', [JasaController::class, 'destroy'])->name('jasa.destroy');
});