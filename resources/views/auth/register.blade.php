@extends('layouts.app')

@section('content')
<title>Register </title>
<div class="container">
     <div class="row" style="margin-top: 20px;font-family: segoe UI;font-weight: lighter;">
        <div class="col s12">
          <div class="card">
              <span class="card-title" style="padding: 8px;">Register</span>
              <div class="card-action" style="margin-bottom: -40px"></div>
                <form class="form-horizontal" method="POST" action="{{route('register_add')}}" enctype="multipart/form-data">
                        <!-- {{ csrf_field() }} -->
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="card-content">
              <div class="row">
                  <div class="col s12">
                  @if(session('message'))
                  <div class="input-field col s12">
                    <div class="chip red white-text col s12 center">
                            {{ session('message') }}
                      <i class="close material-icons">close</i>
                    </div>
                      </div>
                      @endif

                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" type="text" name="name" class="validate" required>
                    <label for="icon_prefix">Nama</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input id="email" type="email" name="email" class="validate" required>
                    <label for="email" data-error="Email Not Valid" data-success="Email Valid">Email</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">lock</i>
                    <input id="password" name="password" type="password" class="validate" required>
                    <label for="password">Password</label>
                </div>
                <div class="input-field col s12 m6">
                     <i class="material-icons prefix">perm_identity</i>
                     <select class="icons" name="jenis_kelamin" id="gender" onchange="gender1()" required>
                     <option disabled selected>Choose your option</option>
                     <option value="Laki-Laki" data-icon="profil/cowo.png" class="left circle">Laki-Laki</option>
                     <option value="Perempuan" data-icon="profil/cewe.png" class="left circle">Perempuan</option>
                     </select>
                     <label>Jenis Kelamin</label>
                </div>
                <div class="input-field col s12 m6 left">
                    <i class="material-icons prefix">date_range</i>
                    <input type="date" name="tanggal_lahir" class="datepicker" placeholder="Tanggal Lahir" required>
                 </div>
                  <div class="input-field col s12 m6 left">
                    <i class="material-icons prefix">phone</i>
                    <!-- <input id="phone_us" name="no_telp" style="font-size: 14pt;margin-top: 20px" type="text" class="validate phone_us" size="12" maxlength="12" onkeypress="return isNumberKey(event)" required> -->
                    <input type="text" name="no_telp" class="phone_us" id="phone_us">
                    <label for="phone_us">Nomor Handphone</label>
                </div>
                 <div class="input-field col s12 m6 left hide">
                    <i class="material-icons prefix">perm_identity</i>
                    <input id="gender2" name="foto" class="validate">
                    <label for="email" data-error="Email Not Valid" data-success="Email Valid">Email</label>
                 </div>
                      <div class="col s12">
                      <br>
                    <button type="submit" style="background:#2196f3" class="waves-effect waves-light btn middle col s12 m12">Register</button><br><br>
              
                    <span class="hide-on-large-only col s12 m12" style="text-align: center;">Sudah Memiliki Akun ? <a href="{{ url('/login') }}">Login Disini</a></span>
                    </div>
              </div>
                </div>
                </form>
            </div>
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
