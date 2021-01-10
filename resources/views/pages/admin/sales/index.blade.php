@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Barang Keluar</h1>
            <a href="{{route('penjualan.create')}}" class="btn btn-sm btn-primary shadow-sm p-2">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Barang Keluar 
            </a>
          </div>

          @if (session('Status'))
          <div class="alert alert-success">
              {{ session('Status') }}
          </div>
          @endif

          <div class="row">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id='thingtable' width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Tanggal Keluar</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                    <th>Tanggal Edit</th>
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($items as $item)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->penjualan_id}}</td>
                      <td>{{$item->created_at}}</td>
                      <td>{{$item->nama}}</td>
                      <td>{{$item->jumlah}}</td>
                      <td>{{$item->harga_jual}}</td>
                      <td>{{$item->keterangan}}</td>
                      <td>{{$item->updated_at}}</td>
                      <td>
                        <a href="{{route('penjualan.edit', $item->id)}}" class="btn btn-info">
                        <i class="fa fa-pencil-alt"></i>
                        </a>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="7" class="text-center"> Data Kosong </td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

          

          
        <!-- /.container-fluid -->

@endsection