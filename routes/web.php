<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

if (Auth::guest()) {
	// Route::get('/', 'UserController@index');
	Route::get('/', ['as'=>'login','uses'=>'UserController@index']);
	Route::post('/trylogin', ['as'=>'login','uses'=>'Auth\LoginController@tryLogin']);
} 
else {
	Route::get('/', 'HomeController@index');
}
Auth::routes();

Route::get('api/foto/{filename}', function($filename){
	$gambar = \App\Foto::where('id', $filename)->first();

	if (count($gambar) == 0) {
		$response = [];
		$response['success'] = 0;
		return response()->json($response);
	}

	$response = [];
	$response['success'] = 1;
	$response['data'] = $gambar;
	return response()->json($response);
});

Route::get('/file/{jenis}/{filename}', function ($jenis,$filename){
  $path = storage_path() . '/'.$jenis.'/' . $filename;
  $file = File::get($path);
  $type = File::mimeType($path);
  $response = Response::make($file);
  $response->header("Content-Type", $type);
  return $response;
});
Route::get('/home', ['as'=>'home','uses'=>'UserController@home'])->middleware('auth');

// User
Route::get('/profile', ['as'=>'profile','uses'=>'UserController@profile'])->middleware('auth');
Route::get('/request', ['as'=>'request','uses'=>'UserController@request'])->middleware('auth');

//Admin
Route::get('/detail/{id}',['as'=>'det_wai','uses'=>'UserController@det_wai'])->middleware('auth');
Route::get('/waiting', ['as'=>'waiting','uses'=>'UserController@waiting'])->middleware('auth');
Route::get('/add_admin', ['as'=>'add_admin','uses'=>'UserController@add_admin'])->middleware('auth');
Route::post('/approved/{id}', ['as'=>'approved','uses'=>'UserController@approved']);
Route::post('/save_admin/{id}', ['as'=>'save_admin','uses'=>'UserController@save_admin']);
Route::post('/delete_admin/{id}', ['as'=>'delete_admin','uses'=>'UserController@delete_admin']);
Route::post('/update', ['as'=>'update_art','uses'=>'UserController@update_art']);
Route::post('/rejected/{id}', ['as'=>'rejected','uses'=>'UserController@rejected'])->middleware('auth');

//Artikel
Route::post('/register/add', ['as'=>'register_add','uses'=>'UserController@register_add']);
Route::post('/save_art',['as'=>'save_art','uses'=>'UserController@save_art']);
Route::post('/hapus/{id}',['as'=>'hapus','uses'=>'UserController@hapus']);
Route::post('/sold/{id}',['as'=>'sold','uses'=>'UserController@sold']);
Route::get('/detail_artikel/{id}', ['as'=>'det_art','uses'=>'UserController@det_art'])->middleware('auth');
Route::get('/cari/', ['as'=>'cari','uses'=>'UserController@cari'])->middleware('auth');
Route::get('/edit_artikel/{id}'	, ['as'=>'edt_art','uses'=>'UserController@edt_art'])->middleware('auth');
Route::get('cari/{nama}' , ['as'=>'nama','uses'=>'UserController@nama'])->middleware('auth');


//Setting
Route::get('profile/settings', ['as'=>'settings','uses'=>'UserController@settings'])->middleware('auth');
Route::post('settings/save_profile',['as'=>'save_profile','uses'=>'UserController@save_profile']);
Route::post('settings/save_pw',['as'=>'save_pw','uses'=>'UserController@save_pw']);
Route::post('settings/save_img',['as'=>'save_img','uses'=>'UserController@save_img']);

// Api
Route::get('api/daftar_kabupaten/{id}', function($id) {
	$response = [];
	$kabupaten = \App\Kabupaten::where('IDProvinsi',$id)->get();

	$response['kabupaten'] = $kabupaten;

	return response()->json($response);
});
Route::get('api/daftar_provinsi/{id}', function($id) {
	$response = [];
	$provinsi = \App\provinsi::where('IDProvinsi',$id)->get();

	$response['provinsi1'] = $provinsi;

	return response()->json($response);
});
Route::get('/report', ['as'=>'report','uses'=>'UserController@report'])->middleware('auth');
Route::get('/laporan', ['as'=>'laporan','uses'=>'UserController@laporan'])->middleware('auth');


