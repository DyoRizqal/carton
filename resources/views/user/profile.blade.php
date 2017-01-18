@extends('layouts.design')

@section('content')
<title>Profile {{auth::user()->name}}  </title>
     <div class="row" style="margin-top: 20px;">
        <div class="col s12 m3 hide-on-small-only">
          <div class="card">
             <div class="card-title blue white-text" style="font-size: 14pt;padding: 2px;white-space: nowrap;overflow: hidden;text-overflow:ellipsis"><i class="material-icons na">account_circle</i>Profil </div>
              <!-- <div class="card-action" style="margin-bottom: -40px;margin-top: 10px"></div> -->
              <div class="card-content">
              <div class="row">
              <img class="responsive-img" src="{!!url('/file/foto/'.Auth::user()->foto)!!}"><br>
              <span class="de" style="font-size: 17pt">{{Auth::user()->name}}</span><br>
      			  @if(Auth::user()->jenis_kelamin == 'Laki-Laki')
      			  <i class="fa fa-male na" style="font-size: 16pt;margin-left: 5px;margin-right: 17px;" aria-hidden="true"></i><span class="de">{{Auth::user()->jenis_kelamin}}</span><br>
      			  @else
      			  <i class="fa fa-female na" style="font-size: 16pt;margin-left: 5px;margin-right: 14px;" aria-hidden="true"></i>{{Auth::user()->jenis_kelamin}}<br>
      			  @endif
      			  <i class="material-icons na">date_range</i><span class="de">Join on {{Auth::user()->tanggal_join}}</span><br>
      			  <i class="material-icons na">mail_outline</i><span class="de">{{Auth::user()->email}}</span><br>
      			  <i class="material-icons na">phone</i><span class="de">{{Auth::user()->no_telp}}</span><br>
                <div class="chip col s12 center" style="margin-top: 10px;font-size: 15pt">
              {{ count($artikel) }} Iklan
              </div>
          </div>
          </div>
        </div>
     </div>
@if(Auth::user()->type!='admin')
		<div class="col s12 m9">
          <div class="card">
              <div class="card-title blue white-text" style="font-size: 15pt;padding: 7px;white-space: nowrap;overflow: hidden;text-overflow:ellipsis">Iklan</div>
           	<div class="card-content">
              	<div class="row">
                  <div class="input-field col s12" style="margin-top: -10px;margin-bottom: -15px">
                      @if(session('success_art'))
                      <div class="col s12">
                    <div class="chip green white-text col s12 center">
                      Iklan Akan Ditampilkan setelah persetujuan pihak CartOn!
                      <i class="close material-icons">close</i>
                    </div>
                      </div>
                    @php
                    session()->forget('success_art');
                    @endphp
                    @endif
                    </div>
              	<div class="input-field col s12">
                  <form class="form-horizontal" method="POST" action="{{route('save_art')}}" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="input-field col s12">
                    <i class="material-icons prefix">create</i>
                    <input id="icon_prefix" type="text" name="judul" class="validate" required>
                    <label for="icon_prefix">Judul</label>
                </div>
                <div class="input-field col s12" style="margin-bottom: 10px">
                  <i class="material-icons">description</i> Deskripsi 
          			  <textarea name="deks" id="content" required></textarea>
               <!-- <label for="textarea1"></label> -->
        			  </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">attach_money</i>
                  <!-- <div id="selling_limit_div" class="form-control for_numberinput"></div>
                  <input type="hidden" class="form-control" id="selling_limit" placeholder="Credit Limit" name="harga"> -->
                  <input type="text" name="harga" class="money" id="money">
                   <!-- <label for="selling_limit" class="hide-on-small-only" style="margin-top:-8px;color: black">Harga</label> -->
                </div>
                
                
                <div class="file-field input-field col s12">
                  <div class="btn" style="background: #f44336">
                    <span><i class="material-icons">folder</i></span>
                    <input type="file" name="foto[]" accept="image/*" multiple>
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text"  placeholder="Upload New Photo">
                  </div>
                </div>
                <div class="input-field col s12">
                    <button type="submit" style="background:#2196f3" class="waves-effect waves-light btn middle col s12 m12">Kirim</button><br><br>
                </div>
              </form>
		 	    </div>
		  </div>
	   </div>
    </div>
   </div>
@else
  <div class="col s12 m9">
          <div class="card">
              <div class="card-title blue white-text" style="font-size: 15pt;padding: 7px;white-space: nowrap;overflow: hidden;text-overflow:ellipsis">Iklan</div>
            <div class="card-content">
                <div class="row">
@endif
  </div>

    

     <style type="text/css">
  input.jqx-input-content.jqx-widget-content {
    padding: 0px !important;
    height: auto !important;
    width: 100% !important;
    outline: none !important;
  }
  .for_numberinput {
    width: 97% !important;
  }

	.na{
		margin-right: 10px;
		margin-top: 10px;
	}
	span .de{
		margin-top: -100px;
	}

</style>
@endsection