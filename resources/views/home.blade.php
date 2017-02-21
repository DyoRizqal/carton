@extends('layouts.design')

@section('content')
<title>Home</title>
    <div class="row" style="font-family: segoe UI;font-weight: lighter;">
    <div class="card col s12" style="margin-top: -15px">
        <div class="col s12 m4">
        <select id="provinsi" class="left col s12 provinsi">
        <option value="" id="optionProvinsi" disabled selected>Provinsi</option>
      @foreach($prov as $provinsi)
          <option value="{{$provinsi->IDProvinsi}}">{{$provinsi->Nama}}</option>
          @endforeach
        </select>
        </div>
        <div class="col s12 m4">
       <select class="left col s12 kabupaten" id="kabupaten">
       <option value="" id="optionKabupaten" disabled selected>Kabupaten</option>
      </select>
      </div>
      <div class="col s12 m4">
      <form action="{{route('cari')}}" method="GET" autocomplete="off">
        <input id="cari" type="text" name="cari" class="validate" placeholder="Pencarian" required>
        </form>
    </div>
      </div>
           @if(session('notfound'))
                      <div class="col s12">
                    <div class="chip red white-text col s12 center">
                      Data Tidak Ditemukan!
                    </div>
                      </div>
                    @php
                    session()->forget('notfound');
                    @endphp
                    @endif
              @if(count($artikel) > 0)

                  @foreach($artikel as $key)
              @php

$foto = \App\Foto::where(['user_id'=>$key->id_user, 'post_id'=>$key->id])->first();

@endphp
        <div class="col s12 m3">
            <div class="card" style="height: 360px;">
            @if($key->sold == "sold")
            <a href="#modal1" style="text-decoration: none;">
            @else
            <a href="{{route('det_art',$key->id)}}" class="black-text">
            @endif
              <div class="card-title blue white-text" style="font-size: 12pt;padding: 4px;white-space: nowrap;overflow: hidden;text-overflow:ellipsis;">{{$key->judul}} </div>
                <div class="card-action" style="margin-top: 5px"></div>
                    <div class="row center">
                      @if($key->sold == "sold")
                <span class="new badge red" data-badge-caption="Sold Out" style="font-size: 12pt;border-radius: 0px;margin-top: -25px"></span>
                @endif
                    <img src="{!!url('/file/foto/'.$foto->filename)!!}" class="responsive-img waves-effect waves-light" style="height: 200px;width: 200px;margin-bottom: 10px;margin-top: 10px"><br>
                    <div class="card-action" style="margin-bottom: -30px;background-size:cover"></div>
                          <span class="card-title right blue-text" style="padding: 2px;padding-right: 5px;font-weight: bold;">
                          Rp. {!!$key['harga']!!}</span>
                    </div>
            </div>
            </a>
        </a>
        </div>

        @endforeach
</div>
  
       
    
          <!-- Modal Structure -->
 <!-- Modal Structure -->
  <div id="modal1" class="modal">
  <div class="col s12">
    <div class="modal-content">
      <h4>Oppsss.... </h4>
      <p>Tidak dapat melihat detail penjualan, karena barang yang dipilih sudah tidak tersedia.</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat">ya, saya mengerti</a>
    </div>
  </div>
    </div>
    @endif
    
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Tambah @if(Auth::user()->type!='user') Admin @else Iklan @endif" href="{{route('profile')}}">
      <i class="large material-icons">@if(Auth::user()->type=="user")mode_edit @else supervisor_account @endif</i>
    </a>
    @if(Auth::user()->type=='superadmin')
    <a class="btn-floating btn-large red waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Laporan" href="{{route('report')}}">
      <i class="large material-icons">print</i>
    </a>
    @endif
  </div>
  

    <script type="text/javascript">
      (function(){
        $('#provinsi').on('change', function(){
          $.ajax({
            url : '{{url('api/daftar_kabupaten')}}/'+this.value,
            type: 'get',
            success : function(data){
              console.log(data);
              $("#kabupaten").html("");
              $.each(data.kabupaten, function(index, value){
                $('#kabupaten').append('<option value="'+value.Nama+'">'+value.Nama+'</option>')
              });
              $("#kabupaten").material_select();
            }
          })
        });
      }())
        
    $(function() {
          $('select.kabupaten').on('change',function() {
                window.location.href =  "cari/"+$(this).val();
          });
    });
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
    </script>
    <style type="text/css">
        a{
            text-decoration: none;
        }
    </style>
@endsection
