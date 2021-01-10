@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-inline-block align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Barang Keluar</h1>
          </div>
          <button type="button" style="float: right" class="btn btn-sm btn-danger shadow-sm p-2 ml-2" id="hapus">Hapus</button>
          <button type="button" style="float: right" class="btn btn-sm btn-primary shadow-sm p-2" id="tambah">Tambah</button>

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
              <form action="{{route('penjualan.store')}}" method="POST">
                @csrf
                @method('POST')
                  <div class="form-group">
                    <label for="id">ID</label>
                    <input type="number" class="form-control" name="id" placeholder="ID" value="{{old('id')}}">
                  </div>
                  <div class="form-group">
                    <label for="nama">Data Barang</label>
                        <select name="nama[]" id="nama" class="form-control">
                            <option value="">== Pilih Nama Barang ==</option>
                            @foreach ($namathings as $id => $name)
                                <option value="{{ $name ->nama }}">{{ $name ->nama }}</option>
                            @endforeach
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah[]" placeholder="Jumlah" value="{{old('jumlah')}}">
                  </div>
                  <div class="form-group">
                    <label for="harga_jual">Harga</label>
                    <input type="number" class="form-control" name="harga_jual[]" placeholder="Harga" value="{{old('harga_jual')}}">
                  </div>
                  <div id="form_dinamis"></div>
                  <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="{{old('keterangan')}}">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                  </button>
              </form>
            </div>
          </div>


          
          

          
        <!-- /.container-fluid -->

@endsection

@section('custom_script')
    <script>
          $(document).ready(function(){
            var id = 0;
            $('#tambah').click(function(){
              id++;
              $('#form_dinamis').append(
                '<div class="form-group" id="nama'+id+'">'+
                '<label for="nama">Data Barang</label>'+
                '<select name="nama['+id+']" id="nama" class="form-control"><option value="">== Pilih Nama Barang ==</option>'+ 
                '@foreach ($namathings as $id => $name)<option value="{{ $name ->nama }}">{{ $name ->nama }}</option> @endforeach</select></div>'+
                '<div class="form-group" id="jumlah'+id+'"><label for="jumlah">Jumlah</label>'+
                '<input type="number" class="form-control" name="jumlah['+id+']" placeholder="Jumlah"></div>'+
                '<div class="form-group"id="harga_jual'+id+'"><label for="harga_jual" >Harga</label>'+
                  '<input type="number" class="form-control" name="harga_jual['+id+']" placeholder="Harga"></div>')
            });

            $('#hapus').click(function(){
              $('#nama'+id).remove();
              $('#jumlah'+id).remove();
              $('#harga_jual'+id).remove();
              id--;
            })
          });
          
    </script>
@endsection