<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Auth;
use Akun;
use Hash;

class UserController extends Controller
{

		public function index()
		{
			if(Auth::check()){
			$s['artikel'] = \App\Artikel::orderBy('id', 'desc')->where('status','approved')->get();
			$s['prov'] =  \App\Provinsi::orderBy('Nama','asc')->get();
			$s['kab'] =  \App\Kabupaten::orderBy('Nama','asc')->get();
			$s['iklan'] =  \App\Artikel::where('id_user',Auth::user()->id)->get();
			return view('home')->with($s);
			}
			else{
			return view('welcome');
			}
		}
		public function home(){
			$s['artikel'] = \App\Artikel::orderBy('id', 'desc')->where('status','approved')->get();
			$s['iklan'] =  \App\Artikel::where('id_user',Auth::user()->id)->get();
			$s['prov'] =  \App\Provinsi::orderBy('Nama','asc')->get();
			$s['kab'] =  \App\Kabupaten::orderBy('Nama','asc')->get();
			return view('home')->with($s);
		}
		public function register_add(){
			$email = Input::get('email');
			$check = \App\Akun::where('email', $email)->first();
			if (count($check)==0) {
				// kalo emailnya gaada
				$s = new \App\Akun;
		        $s->name = Input::get('name');
		        $s->email = Input::get('email');
		        $s->jenis_kelamin = Input::get('jenis_kelamin');
		        $s->password = bcrypt(Input::get('password'));
		        $s->tanggal_lahir = Input::get('tanggal_lahir');
		        date_default_timezone_set('Asia/Jakarta'); 
				$s->tanggal_join = date("D, d M Y");
		        $s->foto = Input::get('foto');
		        $s->type = "user";
		        $s->no_telp = Input::get('no_telp');
		        $s->save();
		        return redirect('login')->with('success_reg','Register berhasil. silahkan lanjutkan untuk login');
			}
			else {
				return redirect('register')->with('message','Email yang anda masukan sudah terpakai!');
			}
	}
		public function profile(){
			$s['artikel'] =  \App\Artikel::where('id_user',Auth::user()->id)->get();
			$s['iklan'] =  \App\Artikel::where('id_user',Auth::user()->id)->get();
			$s['admin'] =  \App\Akun::where('type','admin')->get();
			return view('user.profile')->with($s);
	}
		public function settings(){
			$s['data'] = \App\User::find(Auth::user()->id);
			$s['iklan'] =  \App\Artikel::where('id_user',Auth::user()->id)->get();
			if(Auth::user()->type=='admin'||Auth::user()->type=='superadmin'){
			return view('user.settings')->with($s);
			}
			else{
			return view('user.settings')->with($s);
			}
		}

		public function save_profile(Request $r){
			$s = \App\User::find(Auth::user()->id);
			$s->name = Input::get('name');
			$s->email = Input::get('email');
			if(Input::get('password')!=""){
				$s->password = bcrypt(Input::get('password'));
			}
			$s->no_telp = Input::get('no_telp');
			$s->save();
			$r->session()->put('success_pro', 'Profile Berhasil Diubah');
			return redirect(route('settings'));
	}

		public function save_pw(Request $r){
			$s = \App\User::find(Auth::user()->id);
		if (Hash::check($r->input('pw_lama'), Auth::user()->password)) {
			$s->password = bcrypt(Input::get('pw_baru'));
	    	$r->session()->put('success', 'Password Berhasil Diubah');
	    	$s->save();
	    	return view('user.settings');
		}
		else {
			$r->session()->put('error', 'Password Lama Tidak Sama');
			return view('user.settings');
			}
		}

		public function save_img(Request $r){
			$this->validate($r, ['foto' => 'required | mimetypes:jpeg,jpg,png | max:20480',]);
			$s = \App\User::find(Auth::user()->id);
			$s->name = Input::get('name');
			// if(Input::hasFile('foto')){
			$foto = strtoupper(str_slug(strtoupper(Input::get('name'))))."-".date("YmdHis").uniqid().".".Input::file('foto')->getClientOriginalExtension();
			Input::file('foto')->move(storage_path("foto"),$foto);
			$s->foto = $foto;
			$s->save();
			$r->session()->put('success_img', 'Password Berhasil Diubah');
			return redirect(route('settings'));
		}

		public function save_art(Request $r){
			// $this->validate($r, ['foto' => 'required | mimes:jpeg,jpg,png | max:20480',]);
			$s = new \App\Artikel;
			$s->id_user = Auth::user()->id;
			$s->judul = Input::get('judul');
			$s->deksripsi = Input::get('deks');
			$s->harga = Input::get('harga');
			$s->tempat = Input::get('tempat');
			$s->provinsi = Input::get('provinsi');
			date_default_timezone_set('Asia/Jakarta'); 
			$s->tanggal = date("D, d M Y");
			$s->foto = "dummy";
			$s->status = "waiting";
			$s->save();

			$idArtikel = \App\Artikel::orderBy('id', 'desc')->first();
			$fotos = $r->file('foto');
			// foreach($fotos as $foto){
			// 	echo $foto->getClientOriginalName()." ";
			// }

			foreach($fotos as $foto){
			$fotoName = strtoupper(str_slug(strtoupper(Input::get('name'))))."-".date("YmdHis").uniqid().".".$foto->getClientOriginalExtension();
			$foto->move(storage_path("foto"),$fotoName);
			$fotoUser = new \App\Foto;
			$fotoUser->user_id = Auth::user()->id;
			$fotoUser->post_id = $idArtikel->id;
			$fotoUser->filename = $fotoName;
			$fotoUser->save();
			}
			$r->session()->put('success_art', 'Iklan Akan Ditampilkan setelah persetujuan pihak CartOn!');
			return redirect(route('profile'));
		}
		public function det_art($id){
			$s['artikel'] = \App\Artikel::find($id);
			$s['iklan'] =  \App\Artikel::where('id_user',Auth::user()->id)->get();
			if(count($s['artikel'])==0){
				return view('errors.404');
			}
			else{
			$foto =  \App\Foto::where('post_id',$id)->get();
			return view('user.detail_u')->with($s)->with('foto', $foto);
		}
	}	
		public function edt_art($id){
			$s['artikel'] = \App\Artikel::find($id);
			$s['iklan'] =  \App\Artikel::where('id_user',Auth::user()->id)->get();
			if(count($s['artikel'])==0){
				return view('errors.404');
			}
			else{
				if ($s['artikel']->id_user != Auth::user()->id) {
				return view('errors.404');	
			}
			$foto =  \App\Foto::where('post_id',$id)->get();
			return view('user.edit')->with($s)->with('foto', $foto);
			}	
			
		}
		public function sold($id)
		{
			$s =  \App\Artikel::find($id);
			$s->sold = "sold";
			$s->save();
			return redirect(route('home'));
		}
		public function waiting()
		{
			$s['artikel'] = \App\Artikel::where('status','waiting')->get();
			$s['iklan'] =  \App\Artikel::where('id_user',Auth::user()->id)->get();
			if(Auth::user()->type=='admin'||Auth::user()->type=='superadmin'){
			return view('admin.wait')->with($s);
		}
			else{
				return view('errors.403');
			}
		}
		public function det_wai($id)
		{
			$s['artikel'] = \App\Artikel::find($id);
			$s['iklan'] =  \App\Artikel::where('id_user',Auth::user()->id)->get();
			if(count($s['artikel'])==0){
				return view('errors.404');
			}
			else{
			$foto =  \App\Foto::where('post_id',$id)->get();
			if(Auth::user()->type=='admin'||Auth::user()->type=='superadmin'){
			return view('admin.detail')->with($s)->with('foto', $foto);
		}
		else{
			return view('errors.403');
		}
		}
	}
		public function request()
		{	
			if(Auth::user()->type !='admin'){
			$s['artikel'] = \App\Artikel::orderBy('id','desc')->where('id_user',Auth::user()->id)->get();
			$s['iklan'] =  \App\Artikel::where('id_user',Auth::user()->id)->get();
			return view('user.wait_u')->with($s);
			}
			else{
				return view('errors.403');
			}
		}
		public function approved($id)
		{	
			$s = \App\Artikel::find($id);
			$s->status = "approved";
			$s->save();
			return redirect(route('det_wai',$id));
		}
		public function rejected($id)
		{	
			$s = \App\Artikel::find($id);
			$s->status = "rejected";
			$s->save();
			return redirect(route('det_wai',$id));
		}
		public function cari(Request $r)
		{
			$cari		 = Input::get('cari');
			$artikel 	 = \App\Artikel::where('deksripsi','LIKE', '%' . $cari . '%')->where('status','approved')->get();
			$artikel1 	 = \App\Artikel::where('judul','LIKE', '%' . $cari . '%')->where('status','approved')->get();
			$s['prov'] 	 = \App\Provinsi::orderBy('Nama','asc')->get();
			$s['kab'] 	 = \App\Kabupaten::orderBy('Nama','asc')->get();
			$s['iklan']  = \App\Artikel::where('id_user',Auth::user()->id)->get();
			if(count($artikel)!=0){
				return view('user.cari')->with('artikel',$artikel)->with('artikel1',$artikel1)->with($s);
			}
			else if(count($artikel)==0){
				$artikel1 	 = \App\Artikel::where('judul','LIKE', '%' . $cari . '%')->where('status','approved')->get();
				return view('user.cari')->with($s)->with('artikel',$artikel1);
			}
			else{
			// return view('user.cari')->with('artikel',$artikel)->with('artikel1',$artikel1)->with($s);
				session()->put('notfound', 'Data Tidak Ditemukan!');
				return view('user.cari')->with($s)->with($artikel)->with($artikel1);
			}
		}
		public function nama($nama)
		{
			$s['artikel'] = \App\Artikel::where('status','approved')->where('tempat',$nama)->get();
			$s['prov'] =  \App\Provinsi::orderBy('Nama','asc')->get();
			$s['kab'] =  \App\Kabupaten::orderBy('Nama','asc')->get();
			$s['iklan'] =  \App\Artikel::where('id_user',Auth::user()->id)->get();
			if(count($s['artikel'])==0){
				session()->put('notfound', 'Data Tidak Ditemukan!');
				return view('user.cari')->with($s);
			}
			else{
			return view('user.cari', compact('artikel'))->with($s);
			}
		}
		public function add_admin()
		{
			$s['artikel'] = \App\Artikel::orderBy('id', 'desc')->where('status','approved')->get();
			$s['hasil'] =  \App\Akun::where('type','user')->orderBy('name','asc')->get();
			$s['prov'] =  \App\Provinsi::orderBy('Nama','asc')->get();
			$s['kab'] =  \App\Kabupaten::orderBy('Nama','asc')->get();
			$s['iklan'] =  \App\Artikel::where('id_user',Auth::user()->id)->get();	
			if(Auth::user()->type==''){
				return view('errors.403');
			}
			else{
			return view('admin.add')->with($s);
			}
		}
		public function save_admin($id)
		{
			$s = \App\Akun::find($id);
			$s->type = "admin"; 
			date_default_timezone_set('Asia/Jakarta'); 
			$s->tanggal_jadi = date("D, d M Y,H:i");
			$s->save();
			return redirect(route('profile'));
		}
		public function delete_admin($id)
		{
			$s = \App\Akun::find($id);
			$s->type = "user"; 
			$s->save();
			return redirect(route('profile'));
		}
		public function update_art()
		{
			$s = \App\Artikel::find(Input::get('id'));
			$s->judul =  Input::get('judul');
			$s->deksripsi = Input::get('deks');
			$s->status = "waiting";
			$s->save();
			return redirect(route('det_art',Input::get('id')));
		}
		// public function cari_nama(Request $request)
		// {
		// $query = $request->get('cari_');
  //   	$hasil = \App\Akun::where('name', 'LIKE', '%' . $query . '%')->get();
  //   	$s['artikel'] = \App\Artikel::orderBy('id', 'desc')->where('status','approved')->get();
		// $s['prov'] =  \App\Provinsi::orderBy('Nama','asc')->get();
		// $s['kab'] =  \App\Kabupaten::orderBy('Nama','asc')->get();
		// $s['iklan'] =  \App\Artikel::where('id_user',Auth::user()->id)->get();	
  //   	return view('admin.cari_nama', compact('hasil', 'query'))->with($s);
  //   	}		
	}