<?php

use Illuminate\Support\Facades\Route;

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
Route::get('reboot', function () {
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    dd('Web site Refreshed!  Please, Go back :)');
});
Auth::routes();
Route::get('/', function () {
    return redirect('/admin/login');
});
//Route::view('/','admin.dashboard.dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


