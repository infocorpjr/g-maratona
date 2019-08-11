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

use Illuminate\Support\Facades\Route;

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

    Route::resource('profile', 'Profile\ProfileController',['only' => ['update','delete','index']]);

    Route::put('role/change','Role\RoleController@changeRole')
        ->name('role.change');
    Route::resource('role', 'Role\RoleController',['only' => ['update','index']]);

    Route::group(["middleware" => ["participant"]], function () {
        Route::resource('team', 'Team\TeamController');
    });

    Route::group(["middleware" => ["admin"]], function () {
        Route::resource('user', 'User\UserController');
        Route::resource('user.actor', 'User\Actor\ActorController', ['only' => ['update']]);

        // Route::resource('user/profile', 'User\Profile\ProfileController', ['except' => ['']]);
        Route::resource('marathon', 'Marathon\MarathonController', ['except' => ['create']]);
        Route::resource('marathon.image', 'Marathon\Image\ImageController', ['only' => ['store', 'destroy']]);
        Route::resource('marathon.team', 'Marathon\Team\TeamController', ['only' => ['store', 'destroy']]);
    });
});

// Redimensionamento dinâmico de imagem
// exemplo.com/resize/<base64dir>&<largura>&<altura>&<imagem.ext>
Route::get('resize/{parameters}', 'Resize\ResizeController@show');

Route::get('/noticias', 'NewsController@index')
    ->name('noticias');

Route::get('/eventos', 'EventsController@index')
    ->name('eventos');