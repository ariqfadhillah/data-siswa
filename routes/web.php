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

// Route::get('tanggallahir', function(){
// 	foreach (\App\Siswa::all() as $siswa) {
// 		$tanggal_mulai= strtotime('1995-01-01');
// 		$tanggal_akhir= strtotime('1999-01-01');

// 		$tanggal= rand($tanggal_mulai,$tanggal_akhir);
// 		$tgl_lahir= date('Y-m-d' ,$tanggal);
// 		$siswa->tgl_lahir= $tgl_lahir;
// 		$siswa->save();
// 	}
// }); code untuk logic membuat field tgl_lahir dari thn 1995 hingg 1999

	Route::get('trick',[
	'uses' => 'TrickController@pertama',
	'as' => 'trick.pertama'
]);

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
	Route::post('/siswa/import/','SiswaController@importExcel')->name('siswa.import');

	// Guru Featured
	Route::get('/guru/{id}/profile','GuruController@profile');

	// Blog 
	Route::get('/posts','PostController@index')->name('post.index');

	// Add Blog
	Route::get('/post/add',[
	'uses' => 'PostController@add',
	'as' => 'post.add'
	]);

	// Added Blog
	Route::post('/post/create',[
	'uses' => 'PostController@create',
	'as' => 'post.create'
	]);

	

	// Edit Blog
	Route::get('/post/{post}/edit',[
	'uses' => 'PostController@edit',
	'as' => 'post.edit'
	]);

	// Update Blog
	Route::post('/post/{post}/update',[
	'uses' => 'PostController@update',
	'as' => 'post.update'
	]);

	// Delete Blog
	Route::get('/post/{post}/delete',[
	'uses' => 'PostController@delete',
	'as' => 'post.delete'
	]);
});

// Check hanya siswa yang bisa kesini
Route::group(['middleware' => ['auth','checkRole:siswa']],function(){
	Route::get('profilsaya','SiswaController@profilsaya');
	});

// Check admin & user bisa kesini
Route::group(['middleware' => ['auth','checkRole:admin,siswa']],function(){
	Route::get('/dashboard','DashboardController@index');

	Route::get('getdatasiswa',[
	'uses' => 'SiswaController@get',
	'as' => 'ajax.get'
	]);

// tampilan posting blog slugnya
Route::get('/{slug}',[
	'uses' => 'SiteController@singlePost',
	'as' => 'site.single.post'
	]);

});