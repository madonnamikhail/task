<?php
namespace App\routes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MultiAuthController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('site',[MultiAuthController::class, 'site'])->middleware('auth:web')->name('user');
Route::get('admin',[MultiAuthController::class, 'admin'])->middleware('auth:admin')->name('admin');
Route::get('admin/login',[MultiAuthController::class, 'adminLogin'])->name('admin.login');
Route::post('admin/login',[MultiAuthController::class, 'adminLogged'])->name('save.admin.login');
