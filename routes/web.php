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
Route::get('/profile', ['as'=>'profile','uses'=>'UserController@profile']);
// Route::get('/settings/{id}', ['as'=>'settings','uses'=>'UserController@settings']);
Route::get('/settings', ['as'=>'settings','uses'=>'UserController@settings']);
Route::get('/detail_artikel/{id}', ['as'=>'det_art','uses'=>'UserController@det_art']);
Route::get('/edit_artikel/{id}', ['as'=>'edt_art','uses'=>'UserController@edt_art']);
Route::get('/waiting', ['as'=>'waiting','uses'=>'UserController@waiting']);
Route::get('/detail/{id}',['as'=>'det_wai','uses'=>'UserController@det_wai']);


Route::post('/register/add', ['as'=>'register_add','uses'=>'UserController@register_add']);
Route::post('settings/save_profile',['as'=>'save_profile','uses'=>'UserController@save_profile']);
Route::post('settings/save_pw',['as'=>'save_pw','uses'=>'UserController@save_pw']);
Route::post('settings/save_img',['as'=>'save_img','uses'=>'UserController@save_img']);
Route::post('/save_art',['as'=>'save_art','uses'=>'UserController@save_art']);
Route::post('/sold/{id}',['as'=>'sold','uses'=>'UserController@sold']);


