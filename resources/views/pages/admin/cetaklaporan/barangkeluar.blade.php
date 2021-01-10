@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cetak Laporan Barang Keluar</h1>
          </div>

          <div class="card shadow">
            <div class="card-body">
              <form action="{{route('penjualan.store')}}" method="POST">
                @csrf
                @method('POST')
                    <div class="input-group">
                        <label for="label">Tanggal Awal</label>
                        <input type="date" class="form-control mx-2" name="tglawal" id="tglawal"/>
                    </div>
                    <div class="input-group mt-4">
                        <label for="label">Tanggal Akhir</label>
                        <input type="date" class="form-control mx-2" name="tglakhir" id="tglakhir"/>
                    </div>
                    <div class="input-group mt-4">
                        <a href="" onclick="this.href='/cetakLaporanBarangKeluar/'+document.getElementById('tglawal').value+
                        '/'+document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary col-md-12">Cetak Laporan <i class="fas fa-print"></i></a>      
                    </div>
                  
              </form>
            </div>
          </div>



         
            <div class="card-shadow">
                <div class="card-body">
                    
                </div>
            </div>
          </div>

          

          
        <!-- /.container-fluid -->

@endsection