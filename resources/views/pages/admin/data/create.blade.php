@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Barang</h1> 
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
              <form action="{{route('data.store')}}" method="POST">
                @csrf
                @method('POST')
                  <div class="form-group">
                    <label for="data_id">Nomor</label>
                    <input type="number" class="form-control" name="data_id" placeholder="Nomor Data" value="{{old('data_id')}}">
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
                    <label for="harga">Modal</label>
                    <input type="number" class="form-control" name="harga" placeholder="Modal" value="{{old('harga')}}">
                  </div>
                  <div class="form-group">
                    <label for="hargajual">Harga Jual</label>
                    <input type="number" class="form-control" name="hargajual" placeholder="Harga Jual" value="{{old('hargajual')}}">
                  </div>
                  <div class="form-group">
                    <label for="stok">Stok Awal</label>
                    <input type="number" class="form-control" name="stok" placeholder="Stok" value="{{old('stok')}}">
                  </div>
                  <div class="form-group">
                    <label for="satuan">Satuan</label>
                    <input type="text" class="form-control" name="satuan" placeholder="Satuan" value="{{old('satuan')}}">
                  </div>
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