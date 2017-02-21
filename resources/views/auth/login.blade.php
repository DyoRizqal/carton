@extends('layouts.app')

@section('content')
<title>Login</title>
<div class="container">
     <div class="row" style="margin-top: 20px;">
        <div class="col s12">
          <div class="card">
              <span class="card-title" style="padding: 8px;">Login</span>
              <div class="card-action" style="margin-bottom: -60px"></div>
            <div class="card-content">
            <div class="row">
               <div class="col s12">
                  @if(session('success_reg'))
                  <div class="input-field col s12">
                    <div class="chip green white-text col s12 center">
                            {{ session('success_reg') }}
                    <i class="close material-icons">close</i>
                    </div>
                  </div>
                  @endif
                  @if(session('error'))
                  <div class="input-field col s12">
                    <div class="chip red white-text col s12 center">
                          {{ session()->pull('error') }}
                          <i class="close material-icons">close</i>
                      </div>
                    </div>
                      @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/trylogin') }}" autocomplete="off">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <div class="input-field col s12">
                             <i class="material-icons prefix">email</i>
                             <input id="email" type="email" name="email" class="validate" value="{{ old('email') }}" required autofocus>
                             <label for="email" data-error="Email tidak benar!Bukan tipe email" data-success="Email benar!">Email</label>
                        </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                         <div class="input-field col s12 m12">
                             <i class="material-icons prefix">lock</i>
                             <input id="password" name="password" type="password" class="validate" required>
                             <label for="password">Password</label>
                         </div>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                
                                <button type="submit" class="btn btn-primary col s12 m12">
                                Login
                                </button>
                                
                                <span class="hide-on-large-only col s12 m12" style="text-align: center;">Belum Memiliki Akun ? <a href="{{ url('/register') }}">Daftar Disini</a></
                            </div>
                    </form>
                </div>
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
         .card{
          margin-left: 200px;
          margin-right: 200px;
        }
        @media only screen and (max-width: 992px) {
        .nana{
          width: 125px;
          margin-left: -0.5px;
        }
        #jas:hover{
          color: white;
        }
        .card{
          margin:0;
        }
        }
      </style>
@endsection
