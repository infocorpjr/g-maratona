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
    return redirect()->route('login');
    // return view('welcome');
});

Auth::routes(['verify' => true]);

// Rota para página inicial do dashboard
Route::get('/home', 'HomeController@index')
    ->name('home')
    ->middleware('verified');

Route::group(["middleware" => ["auth", "verified"]], function () {
    Route::resource('user', 'User\UserController');
    Route::resource('user.actor', 'User\Actor\ActorController', [
        'only' => ['update']
    ]);
    Route::resource('marathon', 'Marathon\MarathonController', [
        'only' => ['index', 'show']
    ]);
    Route::resource('marathon.image', 'Marathon\Image\ImageController', [
        'only' => ['store', 'destroy']
    ]);
});

// Redimensionamento dinâmico de imagem
// exemplo.com/resize/<base64dir>&<largura>&<altura>&<imagem.ext>
Route::get('resize/{parameters}', 'Resize\ResizeController@show');