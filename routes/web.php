<?php
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/jasa/{jasaId}', [CategoryController::class, 'showjasa'])->name('jasa.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\ProfilCustomerController;

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