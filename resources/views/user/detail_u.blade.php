@extends('layouts.design')

@section('content')
<title>Detail {{$artikel->judul}}</title>
<div class="container">   
    <div class="row">
        <div class="col s12 m8">
            <div class="card">
                @if($artikel->id_user == Auth::user()->id)
             @if($artikel->sold != "sold" )
             <a href="#modal1" class="right">
            <button id="asd" class="waves-effect waves-light btn white-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Hapus Iklan" type="submit" style="display: block;height: 32px;box-shadow: none;"><i class="material-icons">clear</i></button></a>
            <a href="@if($artikel->status=='waiting')# @else {{route('edt_art',$artikel->id)}} @endif"><span class="new badge yellow black-text" data-badge-caption="@if($artikel->status=='waiting')Waiting @else Edit @endif" style="margin-top: 5px;margin-right: 10px"></span></a>
            @endif
            @endif
             <div class="card-title blue white-text" style="font-size: 12pt;padding: 4px;">{{$artikel->judul}} </div>
       
                <div class="card-action">

                <div class="col s12">
                    {!!$artikel->deksripsi!!} <br>
                </div>
                    <div class="row center">

                    <div class="col s12">
                        <img id="image" class="responsive-img" style="margin-bottom: 50px;max-height: 300px;margin-top: 50px;">
                    </div>
                      @if($artikel->sold == "sold")
                        <a href="#"><span class="new badge red" data-badge-caption="Sold Out" style="margin-top: 5px"></span></a>
                        @endif
                    <div class="carousel">
                        @foreach($foto as $foto)
                       <a class="carousel-item">
                       <img src="{!!url('/file/foto/'.$foto->filename)!!}" class="responsive-img waves-effect waves-light" style="height: 180px;width: 200px;" dir="{!!url('/file/foto/'.$foto->filename)!!}" onclick="getFoto({{$foto->id}})"></li>
                       </a>
                       @endforeach
                    </div>
                    <div class="card-action" style="margin-bottom: -30px;"></div>
                          <span class="card-title right blue-text harga">Rp. {!!$artikel['harga']!!}</span>
                    </div>
                        @if($artikel->status=='waiting')
                        
                        @else
                        @if($artikel->id_user == Auth::user()->id)
                        @if($artikel->sold != "sold")
                        <div class="row">
                        <div class="col s12">
                          <form action="{{route('sold',$artikel->id)}}" method="POST" class="left">
                          {{csrf_field()}}
                            <input type="checkbox" id="test5" />
                              <label for="test5">Ceklist jika barang yang terdapat dalam iklan sudah terjual</label>
                                <button id="soldout" class="waves-effect waves-light btn disabled" type="submit" data-loading-text="Loading..." style="display: block;margin-top: 10px">Sold</button>
                                 </form><br>
                                    </div>
                                    </div>
                                    <form action="{{route('hapus',$artikel->id)}}" method="POST" class="right">
                                    {{csrf_field()}}
                                    <div id="modal1" class="modal">
                                    <div class="col s12">
                                      <div class="modal-content">
                                        <h4><i class="material-icons">warning</i> Peringatan {{Auth::user()->name}}!</h4>
                                        <p class="left">Apakah anda yakin ingin menghapus iklan,<b> {{$artikel->judul}}</b> ?</p>
                                      </div>
                                      <div class="modal-footer left">
                                        <button type="submit" class=" modal-action modal-close waves-effect green white-text waves-light btn-flat">ya, hapus iklan</button>
                                        <div  class=" modal-action modal-close waves-effect red white-text waves-light btn-flat" style="margin-right: 10px">Batal</div>
                                      </div>
                                      </form>
                                    </div>
                                    </div>
                             @endif
                          @endif
                        @endif
               
                </div>
            </div>
        </div>    
        <div class="col s12 m4">
        @php
        $user = \App\Akun::where(['id'=>$artikel->id_user])->first();
        @endphp
         <div class="card">
          <div class="row">
          <div class="col s12">
           <div class="card-title blue white-text" style="font-size: 12pt;padding: 4px;white-space: nowrap;overflow: hidden;text-overflow:ellipsis;">Profil Penjual </div>
              <div class="card-action" style="margin-bottom: -40px;"></div>
              <div class="card-content">
                <i class="material-icons">account_circle</i>
                <span class="card-title" style="padding: 8px;">{{$user->name}}</span><br>
                <i class="material-icons">phone</i>
                <span class="card-title" style="padding: 8px;">{{$user->no_telp}}</span><br>
                <i class="material-icons">place</i>
                <span class="card-title" style="padding: 8px;font-size: 10pt">{{$artikel->provinsi}},  {{$artikel->tempat}}</span><br>
                </div>
            </div>
        </div>        
    </div>
</div>
  <div class="col s12 m4">
         <div class="card">
         <div class="row">
          <div class="col s12">
            <div class="card-title blue white-text" style="font-size: 12pt;padding: 4px;white-space: nowrap;overflow: hidden;text-overflow:ellipsis;">Tanggal </div>
              <div class="card-action" style="margin-bottom: -40px;"></div>
              <div class="card-content">
                <i class="material-icons">date_range</i>
                <span class="card-title" style="padding: 8px;">{{$artikel->tanggal}}</span><br>
                </div>
                
            </div>
        </div>
</div>
</div>
<div class="fixed-action-btn">
<a class="btn-floating btn-large red waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Tambah @if(Auth::user()->type!='user') Admin @else Iklan @endif" href="{{route('profile')}}">
      <i class="large material-icons">@if(Auth::user()->type=="user")mode_edit @else supervisor_account @endif</i>
    </a>
  </div>
    <style type="text/css">

        p{
            margin-bottom: -15px;
        }
        span.harga{
            padding: 2px;
            padding-right: 5px;
            font-weight:bold;
            margin-bottom:-40px;
        }
        #asd{
          background: #2196F3;
        }
        #asd:hover{
            background: #f44336;
        }
    </style>

    <script type="text/javascript">
       $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
    function getFoto(id){
        // alert(id);
        $.ajax({
            url: '{{ url('api/foto') }}/'+id,
            dataType: 'json',
            type: 'GET',
            success: function(data){
                $("#image").attr('src', '{{ url('file/foto') }}/'+data.data.filename);
            }
        });
    }

    </script>
@endsection
