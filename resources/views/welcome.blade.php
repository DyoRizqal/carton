@extends('layouts.app')

@section('content')
<title>CartOn - Make Your Shop Is Easy</title>
  <div class="slider fullscreen">
    <ul class="slides">
      <li>
        <img src="{{url('img/1.png')}}"> <!-- random image -->
        <div class="caption center-align">
          <h3 class="red-text">Memudahkan pembelian barang</h3>
          <h5 class="light red-text text-lighten-3">sesuai keinginan</h5>
        </div>
      </li>
      <li>
        <img src="{{url('img/2.png')}}"> <!-- random image -->
        <div class="caption left-align">
          <h3 class="red-text">Melihat harga barang </h3>
          <h5 class="light red-text text-lighten-3">sesuai kebutuhan</h5>
        </div>
      </li>
      <li>
        <img src="{{url('img/3.png')}}"> <!-- random image -->
        <div class="caption right-align">
          <h3 class="red-text">Bernegosiasi untuk mendapatkan</h3>
          <h5 class="light red-text text-lighten-3">persetujuan yang sesuai</h5>
        </div>
      </li>
      <li>
        <img src="{{url('img/4.png')}}"> <!-- random image -->
        <div class="caption center-align">
          <h3 class="red-text">Meningkatkan kepuasan pelanggan</h3>
          <h5 class="light red-text text-lighten-3">sehingga brand awareness dan customer loyality akan meningkat</h5>
        </div>
      </li>
    </ul>
  </div>
      
<style type="text/css">
  img{
     -webkit-filter: blur(5px);
  -moz-filter: blur(5px);
  -o-filter: blur(5px);
  -ms-filter: blur(5px);
  filter: blur(5px);
  }
</style>
  @endsection