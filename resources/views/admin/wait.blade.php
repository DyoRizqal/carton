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
	          <th data-field="id">No.</th>
	          <th data-field="judul">Judul</th>
	          <th data-field="tanggal">Tanggal</th>
	          <th data-field="operation" class="center">Opsi</th>
	      </tr>
	    </thead>

	    <tbody>
	    @foreach($artikel as $key)
	      <tr>
	        <td>{{ $i }}.<?php $i++;?></td>
	        <td>{{$key->judul}}</td>
	        <td>{{$key->tanggal}}</td>
	        <td class="center"><a href="{{route('det_wai',$key->id)}}" class="waves-effect waves-light btn">Detail</a></td>
	      </tr>
	    @endforeach
	    </tbody>
	  </table>
	</div>
</div>
@endsection