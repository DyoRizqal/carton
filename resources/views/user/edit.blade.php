@extends('layouts.design')

@section('content')
<title>Edit {{$artikel->Judul}}  </title>
     <div class="row" style="margin-top: 20px;">
     	<div class="container">
		<div class="col s12 m12">
          <div class="card">
              <span class="card-title" style="padding: 8px;">Edit Iklan</span>
              <div class="card-action" style="margin-bottom: -40px;margin-top: 15px"></div>
           	<div class="card-content">
              	<div class="row">
              	<div class="input-field col s12">
                  <form class="form-horizontal" method="POST" action="{{route('save_art')}}" enctype="multipart/form-data">
                <div class="input-field col s12">
                    <i class="material-icons prefix">create</i>
                    <input id="icon_prefix" type="text" name="judul" class="validate" required>
                    <label for="icon_prefix">Judul</label>
                </div>
                <div class="input-field col s12" style="margin-bottom: 10px">
                  <i class="material-icons">description</i> Deskripsi 
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
          			  <textarea name="deks" id="content" required></textarea>
               <!-- <label for="textarea1"></label> -->
        			  </div>
        			  <div class="col s12">
                    <button type="submit" style="background:#2196f3" class="waves-effect waves-light btn middle col s12 m12">Kirim</button><br><br>
                </div>
              </form>
		 	    </div>
		  </div>
	   </div>
    </div>
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