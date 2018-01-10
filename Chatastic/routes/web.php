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
    return view('home');
});

Auth::routes();

Route::get('/getUser', 'AdministatorController@getDataView');
Route::put('/getUser', 'AdministatorController@getData');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');

Route::patch('/profile/{id}', 'ProfileController@update')->name('profile.update');


Route::delete('/profile/{id}', 'ProfileController@delete')->name('profile.delete');

Route::get('/profile/view', 'ProfileController@index')->name('profile');

Route::get('/chat', function() {
  return view('chat');
})->middleware('auth')->name('chat');

Route::get('/messages', function() {
  return App\Message::with('user')->get();
})->middleware('auth');

Route::post('/messages', function() {
  $user = Auth::user();
  $user->messages()->create([
    'message' => request()->get('message')
  ]);
  return ['status' => 'OK'];
})->middleware('auth');

Route::get('/admin/view', 'AdministatorController@AllProfiles')->name('admin');
Route::get('/profile/edit/{id}', 'AdministatorController@EditProfile')->name('admin.edit');
Route::patch('/profile/edit/{id}', 'AdministatorController@UpdateProfile')->name('admin.update');
Route::delete('/profile/edit/{id}', 'AdministatorController@DeleteProfile')->name('admin.delete');


