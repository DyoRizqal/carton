@extends('layouts.design')

@section('content')
<title>Tambah Admin</title>
<div class="container">
     <div class="row" style="margin-top: 20px;">
        <div class="col s12 m12">
      
        <div class="card">
             <div class="card-title blue white-text" style="font-size: 14pt;padding: 2px;white-space: nowrap;overflow: hidden;text-overflow:ellipsis"><i class="material-icons na left" style="font-size: 27pt">supervisor_account</i><div style="margin-top: 10px">Tambah Admin</div> </div>
              <!-- <div class="card-action" style="margin-bottom: -40px;margin-top: 10px"></div> -->
              <div class="card-content">
              <div class="row">

			  <div class="chip green white-text col s12 center">
              {{count($hasil)}} User yang dapat dijadikan admin
			  </div>
              <ul class="collection">

                   @foreach($hasil as $hasill)
    <li class="collection-item avatar">
      <img src="{!!url('/file/foto/'.$hasill->foto)!!}" alt="" class="circle">
      <span class="title">{{$hasill->name}}</span>
      <p style="font-size: 9pt">{{$hasill->email}}<br>
         <i class="material-icons" style="float: left;margin-right: 5px">date_range</i> Bergabung Pada, {{$hasill->tanggal_join}}
      </p>
      <form action="{{route('save_admin',$hasill->id)}}" method="POST">
        {{csrf_field()}}
      <button type="submit" class="secondary-content waves-effect waves-light btn tooltipped" data-position="left" data-delay="50" data-tooltip="Pilih Admin"><i class="material-icons">done</i></button>
      </form>
    </li>
      @endforeach
   
  </ul>
          </div>
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