@extends('layouts.design')

@section('content')
<title>Report</title>
 <div class="row" style="margin-top: 20px;">
      <div class="container">
    <div class="col s12 m12">
          <div class="card">
              <div class="card-title blue white-text" style="font-size: 14pt;padding: 2px;white-space: nowrap;overflow: hidden;text-overflow:ellipsis"><i class="material-icons na">book</i>Laporan </div>
                <div class="card-content">
                  <div class="row">
                  <form action="{{route('laporan')}}" method="GET"> 
                   <div class="input-field col s12">
                    <select name="jenis_iklan">
                      <option value="" disabled selected>Pilih Jenis Iklan</option>
                      <option value="semua">Semua Iklan</option>
                      <option value="menunggu">Menunggu Persetujuan</option>
                      <option value="ditolak">Iklan Ditolak</option>
                      <option value="disetujui">Iklan Disetujui</option>
                      <option value="dihapus">Iklan Dihapus</option>
                    </select>
                    <label>Filter</label>
                  </div>  
                <div class="col s12 left">
                  <button type="submit" class="waves-effect waves-light btn right"><i class="material-icons">print</i></button>
                  </div>
                  </form>
               </div>
              </div>
             </div>
            </div>
            </div>
            </div>
@endsection
