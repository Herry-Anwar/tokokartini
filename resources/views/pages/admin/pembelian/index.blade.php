@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Barang Masuk</h1>
            <a href="{{route('pembelian.create')}}" class="btn btn-sm btn-primary shadow-sm p-2">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Barang Masuk 
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
                <table class="table table-bordered"  id='thingtable' width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Kode</th>
                    <th>Tgl Barang Masuk</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Supplier</th>
                    <th>Tgl Edit</th>
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($items as $item)
                    <tr>
                      <td>{{$item->kode_beli}}</td>
                      <td>{{$item->created_at}}</td>
                      <td>{{$item->nama}}</td>
                      <td>{{$item->jumlah}}</td>
                      <td>{{$item->supplier}}</td>
                      <td>{{$item->updated_at->format('d/m/yy')}}</td>
                      <td>
                        <a href="{{route('pembelian.edit', $item->kode_beli)}}" class="btn btn-info">
                        <i class="fa fa-pencil-alt"></i>
                        </a>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="6" class="text-center"> Data Kosong </td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>

@endsection