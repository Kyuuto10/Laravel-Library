<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\{
                            HomeController,BookController,
                            CategoryController,SiswaController,
                            RombelController,PetugasController,
                            ProfileController,PeminjamanController,
                            PengembalianController
                        };  

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
    
Auth::routes();



//Admin Route lists

Route::middleware(['auth','user-access:admin'])->group(function(){
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::resource('book', BookController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('student', SiswaController::class);
    Route::resource('rombel', RombelController::class);
    Route::resource('petugas', PetugasController::class);
    Route::resource('pengembalian', PengembalianController::class);
    Route::resource('peminjaman', PeminjamanController::class);
    Route::get('peminjaman/getData/{nis}', [PeminjamanController::class, 'getData'])->name('peminjaman.getData');
    Route::get('peminjaman/getBook/{id_book}', [PeminjamanController::class, 'getBook'])->name('peminjaman.getBook');
    Route::get('profile/index', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('profile/edit', [ProfileController::class, 'editProfile'])->name('profile.update');
    Route::post('profile/store', [ProfileController::class, 'storeProfile'])->name('profile.store');

    route::get('logout', [LoginController::class, 'logout'])->name('logout');
});




//Petugas Route lists

Route::middleware(['auth','user-access:petugas'])->group(function(){
    Route::get('/petugas/home', [HomeController::class, 'petugasHome'])->name('petugas.home');
});




Route::middleware(['auth','user-access:user'])->group(function(){
    Route::get('/user/home', [HomeController::class, 'index'])->name('user.home');
});