@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Barang Keluar</h1> 
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
              <form action="{{route('penjualan.update', $items->id)}}" method="POST" >
                @csrf
                @method('PUT')
                  <div class="form-group">
                    <label for="id">ID</label>
                    <input type="number" class="form-control" disabled name="id" placeholder="ID" value="{{$items->penjualan_id}}">
                  </div>
                  <div class="form-group">
                    <label for="nama">Data Barang</label>
                        <select name="nama[]" id="nama" disabled class="form-control">
                            <option value="{{$items->nama_thing->nama}}">{{$items->nama_thing->nama}}</option>
                            {{-- @foreach ($namathings as $id => $name)
                                <option value="{{ $name ->nama }}">{{ $name ->nama }}</option>
                            @endforeach --}}
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" placeholder="Jumlah" value="{{$items->jumlah}}">
                  </div>
                  <div class="form-group">
                    <label for="harga_jual">Harga</label>
                    <input type="number" class="form-control" name="harga_jual" placeholder="Harga" value="{{$items->harga_jual}}">
                  </div>
                  <div id="form_dinamis"></div>
                  <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="{{$items->keterangan}}">
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