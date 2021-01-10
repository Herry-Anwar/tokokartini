@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
            <a href="{{route('data.create')}}" class="btn btn-sm btn-primary shadow-sm p-2">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Barang 
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
                <table class="table table-bordered" width="100%" cellspacing="0" id='thingtable'>
                  <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Modal</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Kemasan</th>
                    <th>Supplier</th>
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($items as $item)
                    <tr>
                      <td>{{$item->data_id}}</td>
                      <td>{{$item->nama}}</td>
                      <td>{{$item->harga}}</td>
                      <td>{{$item->hargajual}}</td>
                      <td>{{$item->stok}}</td>
                      <td>{{$item->satuan}}</td>
                      <td>{{$item->supplier}}</td>
                      <td>
                        <a href="{{route('data.edit', $item->data_id)}}" class="btn btn-info">
                        <i class="fa fa-pencil-alt"></i>
                        </a>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="8" class="text-center"> Data Kosong </td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          

          
        <!-- /.container-fluid -->

@endsection