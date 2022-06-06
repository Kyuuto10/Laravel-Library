<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ MemberController, RayonController, RombelControler, BookController, BorrowingController};
use App\Http\Controllers\Auth\ForgotPasswordController;

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function(){
        /**
         * Register routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login routes
         */

         Route::get('/login', 'LoginController@show')->name('login.show');
         Route::post('/login', 'LoginController@login')->name('login.perform');

    });
    Route::group(['middleware' => ['auth']], function(){
        /**
         * logout routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        Route::resource('rombel' , RombelController::class);
        Route::resource('rayon', RayonController::class);
        Route::resource('members', MemberController::class);
        Route::resource('books', BookController::class);
        Route::resource('borrowings', BorrowingController::class);
        
    // });
        /**
         * kategori routes
         */

    });
});





Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');