<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;


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

Route::get('/set-language',[HomeController::class,'SetLang']);
Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/contact-us', [HomeController::class, 'contactUS'])->name('contact-us');
Route::get('/feedback', [HomeController::class, 'feedbackSubmit'])->name('feedback');
Route::get('/site-map', [HomeController::class, 'siteMap'])->name('site-map');
Route::get('/search', [SearchController::class, 'getSearchData'])->name('search');
Route::view('/testView', 'pages.testView');
Route::view('/photo-gallery', 'pages.photoGallery');
Route::view('/video-gallery', 'pages.videoGallery');
Route::get('/screen-reader-access', [HomeController::class, 'screenReaderAccess'])->name('screen-reader-access');
Route::get('/{Slug}/{middelSlug?}/{lastSlug?}/{finalSlug?}/{finallastSlug?}', [HomeController::class, 'getContentAllPages']);

//default behaviour, always keep as last entry
Route::any('{url}', function(){
    return redirect('/');
})->where('url', '.*');

