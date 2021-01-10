@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola User</h1>
            <a href="{{route('daftar')}}" class="btn btn-sm btn-primary shadow-sm p-2">
            <i class="fas fa-plus fa-sm text-white-50"></i>Register 
            </a>
          </div>

          @if (session('Status'))
            <div class="alert alert-success">
                {{ session('Status') }}
            </div>
          @endif

          <div class="row">
            <div class="card-body">
              <div class="table-responsive" >
                <table class="table table-bordered" id='thingtable' width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($items as $item)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->email}}</td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="3" class="text-center"> Data Kosong </td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          

          
        <!-- /.container-fluid -->

        </div>
@endsection