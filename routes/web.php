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

Route::get('/', function () {
    return view('website.index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Rotas para o CMS
Route::group(["prefix" => "admin", "middleware" => ["auth"], 'as' => 'admin.'], function () {

    Route::get('/', function () {
        return view('cms.index');
    })->name('index');

    // EVENTO
    Route::resource('event', 'Cms\Event\EventController');
    // FILE
    Route::resource('file', 'Cms\File\FileController');
    // GALLERY
    Route::resource('gallery', 'Cms\Gallery\GalleryController');
    // IMAGE
    Route::resource('image', 'Cms\Image\ImageController');
    // POST
    Route::resource('post', 'Cms\Post\PostController');

});