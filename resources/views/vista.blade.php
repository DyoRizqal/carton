<title>Permintaan Persetujuan</title>
<!-- <div class="container"> -->

<div class="row" style="margin-top: 20px;">
		<div class="col s12" >
		<div style="text-align: center;">
		<?php
			date_default_timezone_set('Asia/Jakarta'); 
		?>
				@if($data1 == "menunggu")
				LAPORAN IKLAN YANG BELUM DIKONFIRMASI<br>
				<?php
				 echo "Tanggal ". date("d M Y");
				 ?>
				@elseif($data1=='ditolak')
				LAPORAN IKLAN YANG TIDAK DISETUJUI<br>
				<?php
				 echo "Tanggal ". date("d M Y");
				 ?>
				 @elseif($data1=='disetujui')
				LAPORAN IKLAN YANG TELAH DISETUJUI<br>
				<?php
				 echo "Tanggal ". date("d M Y");
				 ?>
				 @elseif($data1=='dihapus')
				LAPORAN IKLAN YANG SUDAH DIHAPUS<br>
				<?php
				 echo "Tanggal ". date("d M Y");
				 ?>
				 @else
				 LAPORAN SELURUH IKLAN<br>
				 <?php
				 echo "Tanggal ". date("d M Y");
				 ?>
				@endif
		</div>
		<br>
		</div>
	<div class="col s12">
	<table class="highlight white bordered">
	    <thead class="blue white-text">
	      <tr>
	      <?php
	      $i=1;
	      ?>
	          <th data-field="id" style="text-align: center;" >No.</th>
	          <th data-field="judul" >Judul</th>
	          <th data-field="tanggal">Tanggal</th>
	          <th data-field="status">Status</th>
	      </tr>
	    </thead>

	    <tbody>
	    @foreach($data as $key)
	      <tr>
	        <td style="text-align: center;">{{ $i }}.<?php $i++;?></td>
	        <td>{{$key->judul}}</td>
	        <td>{{$key->tanggal}}</td>
	        @if($key->status=='approved')
	        <td><div class="waves-effect waves-light btn green white-text col s12">Disetujui</div></td>
	        @elseif($key->status=='waiting')
	        <td><div class="waves-effect waves-light btn yellow black-text col s12">Menunggu</div></td>
	        @elseif($key->status=='rejected')
	        <td><div class="waves-effect waves-light btn red white-text col s12">Ditolak</div></td>
	        @elseif($key->status=='deleted')
	        <td><div class="waves-effect waves-light btn red white-text col s12">Dihapus</div></td>
	        @endif		  
		 </tr>
	    @endforeach
	    </tbody>
	  </table>
	  <br>
	</div>
</div>

<!DOCTYPE html>
<html>
<body>

<!-- <p>Click the button to print the current page.</p>

<button onclick="myFunction()">Print this page</button>

<script>
function myFunction() {
    window.print();
}
</script> -->

</body>
</html>

<style type="text/css">
*{
	font-family: sans-serif;
}
tr:nth-child(even) {background-color: #f2f2f2}
th {
    background-color: #4CAF50;
    color: white;
    @if($data1=="menunggu")
    background-color: #ff5722;
    color: white;
    @elseif($data1=="ditolak")
    background-color: #f44336;
    color: white;
    @elseif($data1=="disetujui")
    background-color: #009688;
    color: white;
    @elseif($data1=="dihapus")
    background-color: #d50000;
    color: white;
    @else
    background-color: #2962ff;
    color: white;
    @endif
}
th, td {
    padding: 15px;
    text-align: left;
}
tr:hover {background-color: #f5f5f5}
table {
    width: 100%;
    border:1px solid black;
    border-collapse: collapse;
}
td {
    vertical-align: bottom;
}
</style>