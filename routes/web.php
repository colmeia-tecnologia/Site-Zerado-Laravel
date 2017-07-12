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

Auth::routes();

/*
 * PAINEL
 */
Route::group([
                'domain' => 'painel.'.str_replace('http://','',env('APP_URL')),
                'namespace' => 'Painel',
                'middleware' => 'auth'
            ], function() 
{
    Route::get('/', 'PainelController@index');
    Route::resource('banners', 'BannerController');
    Route::resource('services', 'ServiceController');
    Route::resource('portfolios', 'PortfolioController');
    
    Route::resource('post_categories', 'PostCategoryController');
    Route::resource('posts', 'PostController');

    Route::get('upload', 'UploadController@index');
    Route::post('upload/upload', 'UploadController@upload')->name('upload.upload');
    Route::get('upload/delete/{file}', 'UploadController@delete')->name('upload.delete');
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
