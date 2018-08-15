<?php

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

/*Route::get('/', function () {
    return redirect()
        ->route('admin.login');
});*/

Route::get('/updateapp', function()
{
    exec('composer dump-autoload');
    echo 'composer dump-autoload complete';
});

Route::get('/cache-clear', function() {
    $exitCode = Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/config-clear', function() {
    $exitCode = Artisan::call('config:clear');
    return "Config clear";
});

Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return "Config cache clear";
});

Route::get('/vendor-publish', function() {
    $exitCode = Artisan::call('vendor:publish');
    return "Vendor publish";
});

Route::get('/vendor-publish-sluggable', function() {
    $exitCode = Artisan::call('vendor:publish', [
        '--provider' => 'Cviebrock\EloquentSluggable\ServiceProvider',
    ]);
    return "Vendor publis cviebrock sluggable";
});

Route::group(['prefix' => '/'], function()
{
    Route::get('/', 'HomeController@index')->name('home.index');
});

Route::group(['prefix' => 'lugares'], function()
{
    Route::get('/{slug}', 'PlaceController@show')->name('lugares.show');
});

Route::group(['prefix' => 'reviews'], function()
{
    Route::get('/{slug}', 'ReviewController@show')->name('reviews.show');
});
Route::get('/nosotros', 'HomeController@us')->name('home.us');
Route::get('/listar-reviews', 'ReviewController@list')->name('reviews.list');
Route::get('/filtrar-reviews', 'ReviewController@filterReviews')->name('reviews.filter');
Route::get('/remover', 'ReviewController@remove')->name('reviews.remove');

Route::get('/lugares-visitados', 'PlaceController@list')->name('places.list');

Route::get('/politicas-de-privacidad', 'HomeController@politicas')->name('home.politicas');

Route::get('/terminos-y-condiciones-de-uso', 'HomeController@uso')->name('home.uso');

//Auth::routes();

Route::group(['prefix' => 'admin'], function()
{
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\LoginController@login')->name('admin.login.submit');
    Route::post('/register', 'Auth\RegisterController@register')->name('admin.register.submit');
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::middleware(['auth'])->group(function () {
        Route::get('/logout', 'Auth\LoginController@logout')->name('admin.logout');
        Route::get('/', 'DashboardController@index')->name('admin.dashboard');
        Route::resource('/categoria', 'CategoryController');
        Route::post('/review/hidden', 'ReviewController@hidden')->name('review.hidden');
        Route::resource('/review', 'ReviewController');
        Route::resource('/lifestyle', 'LifestyleController');
        Route::post('/lugar/hidden', 'PlaceController@hidden')->name('lugar.hidden');
        Route::resource('/lugar', 'PlaceController');
        Route::resource('/image', 'ImageController');

    });
}); 
