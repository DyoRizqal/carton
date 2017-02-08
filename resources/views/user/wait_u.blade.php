@extends('layouts.design')
@section('content')
<title>Permintaan Persetujuan</title>
<!-- <div class="container"> -->
<div class="row" style="margin-top: 20px">
	<div class="col s12">
	<table class="highlight white bordered">
	    <thead class="blue white-text">
	      <tr>
	      <?php
	      $i=1;
	      ?>
	          <th data-field="id" class="center">No.</th>
	          <th data-field="judul">Judul</th>
	          <th data-field="tanggal">Tanggal</th>
	          <th data-field="operation" class="center">Opsi</th>
	      </tr>
	    </thead>

	    <tbody>
	    @foreach($artikel as $key)
	      <tr>
	      @if(count($key)==0)
	      asdasdasdasdasd
	      @else
	        <td class="center">{{ $i }}.<?php $i++;?></td>
	        <td>{{$key->judul}}</td>
	        <td>{{$key->tanggal}}</td>
	        @if($key->status=='waiting')
	        <td class="center"> <div class="chip black-text col s12 no-user-select" style="background: #ffd54f; cursor: default;">
		    Menunggu
		  	</div></td>
		  	@endif
		  	@if($key->status=='approved')
	        <td class="center"> <div class="chip green white-text col s12 no-user-select" style="cursor: default;">
		    Disetujui
		  	</div></td>
		  	@endif
		  	@if($key->status=='rejected')
	        <td class="center"> <div class="chip red white-text col s12 no-user-select" style="cursor: default;">
		    Ditolak
		  	</div></td>
		  	@endif
		  @endif
		 </tr>
	    @endforeach
	    </tbody>
	  </table>
	</div>
</div>
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red" href="{{route('profile')}}">
      <i class="large material-icons">@if(Auth::user()->type=="user")mode_edit @else supervisor_account @endif</i>
    </a>
  </div>
@endsection