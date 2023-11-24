<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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
// Route::get('/', function () {
//     return view('welcome');
// });
function set_active($route) {
    if( is_array( $route ) ){
        return in_array(Request::path(), $route) ? 'hover show' : '';
    }
    return Request::path() == $route ? 'hover show' : '';
}
function set_active1($route) {
    if( is_array( $route ) ){
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}
require __DIR__ .'/cms_web.php';
Artisan::call('cache:clear');
Artisan::call('view:clear');
Artisan::call('route:clear');
Artisan::call('config:clear');

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/{slug}', [HomeController::class, 'getContentAllPages']);
Route::get('/contact-us', [HomeController::class, 'contactUS'])->name('contact-us');


//default behaviour, always keep as last entry
Route::any('{url}', function(){
    return redirect('login');
})->where('url', '.*');

