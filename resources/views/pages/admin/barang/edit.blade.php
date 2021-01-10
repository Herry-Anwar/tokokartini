@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Nama Barang </h1> 
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
              <form action="{{route('barang.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                  <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{$item->nama}}">
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