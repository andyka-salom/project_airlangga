<?php
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilCustomerController;
use App\Http\Controllers\JasaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [CategoryController::class, 'welcome'])->name('welcome');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/jasa/{jasaId}', [CategoryController::class, 'showjasa'])->name('jasa.show');
Route::get('/cust/categoryshow', [CategoryController::class, 'show'])->name('cust.categoryshow');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/profil-customer', [ProfilCustomerController::class, 'show'])->name('profil-customer.show');
Route::get('/profil-customer/create', [ProfilCustomerController::class, 'create'])->name('profil-customer.create');
Route::post('/profil-customer', [ProfilCustomerController::class, 'store'])->name('profil-customer.store');
Route::get('/profil-customer/edit', [ProfilCustomerController::class, 'edit'])->name('profil-customer.edit');
Route::put('/profil-customer', [ProfilCustomerController::class, 'update'])->name('profil-customer.update');
Route::get('/cust/profil-customer/show', [ProfilCustomerController::class, 'show'])->name('cust.profil-customer.show');
Route::get('/profil-customer/edit-password', [ProfilCustomerController::class, 'editPassword'])->name('edit-password');
Route::put('/profil-customer/update-password', [ProfilCustomerController::class, 'updatePassword'])->name('update-password');
Route::delete('/profil-customer/delete-account', [ProfilCustomerController::class, 'destroy'])->name('delete-account');

Route::get('Admincategory', [CategoryController::class, 'indexAdmin'])->name('category.index');
Route::get('Admincategory/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('Admincategory', [CategoryController::class, 'store'])->name('category.store');
Route::get('Admincategory/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('Admincategory/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('Admincategory/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/profile', [ProfilCustomerController::class, 'show'])->name('profile');

Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/admin/categories', [CategoryController::class, 'indexAdmin'])->name('Admincategory');
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/admin/categories', [CategoryController::class, 'store'])->name('category.store');
Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/jasa', [JasaController::class, 'index'])->name('jasa.index');
Route::get('/admin/jasa', [JasaController::class, 'indexAdmin'])->name('Adminjasa');
Route::get('/admin/jasa/create', [JasaController::class, 'create'])->name('jasa.create');
Route::post('/admin/jasa', [JasaController::class, 'store'])->name('jasa.store');
Route::get('/admin/jasa/{id}/edit', [JasaController::class, 'edit'])->name('jasa.edit');
Route::put('/admin/jasa/{id}', [JasaController::class, 'update'])->name('jasa.update');
Route::delete('/admin/jasa/{id}', [JasaController::class, 'destroy'])->name('jasa.destroy');

Route::get('/order/{provider}', 'OrderController@showOrderForm')->name('order');
Route::post('/order/{provider}', 'OrderController@placeOrder')->name('placeOrder');

