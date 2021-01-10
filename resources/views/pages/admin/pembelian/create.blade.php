@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Barang Masuk</h1> 
          </div>

          {{-- Menampilkan Error jika ada --}}
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{$error}}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <div class="card shadow">
            <div class="card-body">
              <form action="{{route('pembelian.store')}}" method="POST">
                @csrf
                @method('POST')
                  <div class="form-group">
                    <label for="kode_beli">Kode Pembelian</label>
                    <input type="number" class="form-control" name="kode_beli" placeholder="Kode Pembelian" 
                    value="{{old('kode_beli')}}">
                  </div>
                  <div class="form-group">
                    <label for="nama">Data Barang</label>
                        <select name="nama" id="nama" class="form-control">
                            <option value="">== Pilih Nama Barang ==</option>
                            @foreach ($namathings as $id => $name)
                                <option value="{{ $name ->nama }}">{{ $name ->nama }}</option>
                            @endforeach
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" placeholder="Jumlah" value="{{old('jumlah')}}">
                  </div>
                  <div id="form_dinamis"></div>
                  <div class="form-group">
                    <label for="supplier">Supplier</label>
                    <input type="text" class="form-control" name="supplier" placeholder="Nama Supplier" value="{{old('supplier')}}">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                  </button>
              </form>
            </div>
          </div>

          <div class="row">
            <div class="card-body">
              
            </div>
          </div>

        <!-- /.container-fluid -->
@endsection