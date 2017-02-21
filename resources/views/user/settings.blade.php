@extends('layouts.design')

@section('content')
<title>Setting</title>
<div class="container">
     <div class="row" style="font-family: segoe UI;font-weight: lighter;">
        <div class="row">
        <div class="col s12 m4 left">
        	<div class="card">
              <span class="card-title" style="padding: 10px;"><i class="material-icons">photo</i> Foto</span>
              <div class="card-action" style="margin-bottom: -40px"></div>
                <form class="form-horizontal" method="POST" autocomplete="off" action="{{route('save_img')}}" enctype="multipart/form-data">
                        <!-- {{ csrf_field() }} -->
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input id="icon_prefix" type="hidden" name="name" class="validate" value="{{Auth::user()->name}}" required>
            <div class="card-content">
              <div class="row">
                  <div class="input-field col s12" style="margin-top: -10px;margin-bottom: -15px">
                      @if(session('success_img'))
                      <div class="col s12">
                    <div class="chip green white-text col s12 center">
                      Profile Berhasil Diubah!
                      <i class="close material-icons">close</i>
                    </div>
                      </div>
                    @php
                    session()->forget('success_img');
                    @endphp
                    @endif
                    </div>
                <div class="input-field col s12">
                    <img class="responsive-img" src="{!!url('/file/foto/'.Auth::user()->foto)!!}">
                </div>
        	  </div>
        	   <div class="file-field input-field">
      <div class="btn" style="background: #f44336">
        <span><i class="material-icons">folder</i></span>
        <input type="file" name="foto" accept="image/*" multiple>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text"  placeholder="Upload New Photo">
      </div>
    </div>
    <button type="submit" style="background:#2196f3" class="waves-effect waves-light btn middle col s12 m12">Ubah Foto</button><br><br>
        	</div>
        		</form>
        	</div>
        </div>
          <ul class="collapsible col s12 m8 left" data-collapsible="accordion">
               <div class="input-field col s12" style="margin-top: -5px;margin-bottom: -5px">
                @if(session('error'))
                    <div class="col s12">
                      <div class="chip red white-text col s12 center">
                        Password Tidak Cocok!
                        <i class="close material-icons">close</i>
                      </div>
                    </div>
                    @php
                    session()->forget('error');
                    @endphp
                    @endif
                    </div>

                    <div class="input-field col s12" style="margin-top: -5x;margin-bottom: -5px">
                      @if(session('success'))
                      <div class="col s12">
                    <div class="chip green white-text col s12 center">
                      Password Berhasil Diubah!
                      <i class="close material-icons">close</i>
                    </div>
                      </div>
                    @php
                    session()->forget('success');
                    @endphp
                    @endif
                    </div>

                    <div class="input-field col s12" style="margin-top: -5px;margin-bottom: -5px">
                      @if(session('success_pro'))
                      <div class="col s12">
                    <div class="chip green white-text col s12 center">
                      Profile Berhasil Diubah!
                      <i class="close material-icons">close</i>
                    </div>
                      </div>
                    @php
                    session()->forget('success_pro');
                    @endphp
                    @endif
                    </div>
    <li>
   <!-- umum -->
      <div class="collapsible-header"><i class="material-icons">face</i>Umum</div>
      <div class="collapsible-body">
      <!-- <div class="col s12"> -->
      <form method="POST" action="{{route('save_profile')}}" autocomplete="off" enctype="multipart/form-data">
                        <!-- {{ csrf_field() }} -->
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          
              <div class="row">
              <div class="input-field col s12">
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" type="text" name="name" class="validate" value="{{Auth::user()->name}}" required>
                    <label for="icon_prefix">Nama</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input id="email" type="email" name="email" class="validate" value="{{Auth::user()->email}}" required>
                    <label for="email" data-error="Email Not Valid" data-success="Email Valid">Email</label>
                </div>
                <div class="input-field col s12 m6 left">
                    <i class="material-icons prefix">date_range</i>
                    <input type="date" name="tanggal_lahir" class="datepicker" placeholder="{{Auth::user()->tanggal_lahir}}" required>
                 </div>
                  <div class="input-field col s12 m6 left">
                    <i class="material-icons prefix">phone</i>
                    <input id="no_telp" name="no_telp" type="text" class="validate" size="12" value="{{Auth::user()->no_telp}}" maxlength="12" onkeypress="return isNumberKey(event)" required>
                    <label for="no_telp">Nomor Handphone</label>
                </div>
                <div class="col s12">
                      <br>
                    <button type="submit" style="background:#2196f3" class="waves-effect waves-light btn middle col s12 m12">Ubah Profil</button><br><br>
                    </div>
              </div>
                </div>
                </form>
                </div>
    </li>
    <!-- Penutup Umum -->

    <!-- Password -->
    <li>
      <div class="collapsible-header"><i class="material-icons">lock</i>Password</div>
      <div class="collapsible-body">     
      <!-- <div class="col s12">         -->   
      <form method="POST" action="{{route('save_pw')}}" autocomplete="off" enctype="multipart/form-data">
                        <!-- {{ csrf_field() }} -->
        <input type="hidden" name="_token" value="{{csrf_token()}}">

             <div class="card-content">
              <div class="row">
              <div class="input-field col s12">
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input id="icon_prefix" type="password" name="pw_lama" class="validate" required>
                    <label for="icon_prefix">Password Lama</label>
                </div>
              <div class="input-field col s12">
                    <i class="material-icons prefix">lock_outline</i>
                    <input id="icon_prefix" type="password" name="pw_baru" class="validate" required>
                    <label for="icon_prefix">Password Baru</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock_outline</i>
                    <input id="icon_prefix" type="password" name="konfirmasi_pw" class="validate" required>
                    <label for="icon_prefix">Konfirmasi Password</label>
                </div>
                <div class="col s12">
                      <br>
                    <button type="submit" style="background:#2196f3" class="waves-effect waves-light btn middle col s12 m12">Ubah Password</button><br><br>
                    </div>
              </div>
                </div>
                </form>
                </div>
    			</li>
  			  </ul>
    		</div>
 		  </div>
 		 </div>

                   
         <style type="text/css">
        .nana{
          width: 155px;
          margin-left: 50px;
        }
        #dropdown1{
          margin-top: 65px;
          margin-left: 18px;
        }
        
        @media only screen and (max-width: 992px) {
        .nana{
          width: 125px;
          margin-left: -0.5px;
        }
        #jas:hover{
          color: white;
        }
        }
      </style>
@endsection
