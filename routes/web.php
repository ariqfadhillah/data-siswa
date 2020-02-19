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
// tampilan home
Route::get('/','SiteController@home');
Route::get('/register','SiteController@register');
Route::get('/about','SiteController@about');
Route::post('/postregister','SiteController@postRegister');



// Login
Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

// Check hanya admin yang bisa kesini
Route::group(['middleware' => ['auth','checkRole:admin']],function(){

	// Siswa Featured
	Route::get('/siswa','SiswaController@index');
	Route::post('/siswa/create','SiswaController@create');
	Route::get('/siswa/{siswa}/edit','SiswaController@edit');
	Route::post('/siswa/{siswa}/update','SiswaController@update');
	Route::get('/siswa/{siswa}/delete','SiswaController@delete');
	Route::get('/siswa/{siswa}/profile','SiswaController@profile');
	Route::post('/siswa/{id}/addnilai','SiswaController@addnilai');
	Route::get('/siswa/{id}/{idmapel}/deletenilai','SiswaController@deletenilai');
	Route::get('/siswa/exportExcel/','SiswaController@exportExcel');
	Route::get('/siswa/exportPDF/','SiswaController@exportPDF');

	// Guru Featured
	Route::get('/guru/{id}/profile','GuruController@profile');

	// Posting Blog 
	Route::get('/posts','PostController@index')->name('post.index');
	Route::get('/post/add',[
	'uses' => 'PostController@add',
	'as' => 'post.add'
	]);
	Route::post('/post/create',[
	'uses' => 'PostController@create',
	'as' => 'post.create'
	]);
});

// Check admin & user bisa kesini
Route::group(['middleware' => ['auth','checkRole:admin,siswa']],function(){
	Route::get('/dashboard','DashboardController@index');

Route::get('/{slug}',[
	'uses' => 'SiteController@singlePost',
	'as' => 'site.single.post'
]);

});