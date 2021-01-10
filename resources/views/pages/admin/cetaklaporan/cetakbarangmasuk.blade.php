<html>
  <head>
    <link href="{{url('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{url('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">
<link href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">

  </head>
  <body>
      <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mt-4 ml-2" style="font-weight: bold">Laporan Barang Masuk</h1>
          </div>

          @if (session('Status'))
          <div class="alert alert-success">
              {{ session('Status') }}
          </div>
          @endif

          <div class="row">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Kode</th>
                    <th>Tgl Barang Masuk</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Supplier</th>
                    <th>Tgl Edit</th>
                    </tr>
                  </thead>
                  <tbody >
                    @forelse ($cetakLaporan as $item)
                    <tr>
                      <td>{{$item->kode_beli}}</td>
                      <td>{{$item->created_at->format('d/m/yy')}}</td>
                      <td>{{$item->nama}}</td>
                      <td>{{$item->jumlah}}</td>
                      <td>{{$item->supplier}}</td>
                      <td>{{$item->updated_at->format('d/m/yy')}}</td>
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


           <script src="{{url('backend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{url('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{url('backend/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{url('backend/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{url('backend/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{url('backend/js/demo/chart-pie-demo.js')}}"></script>

    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


  </body>
</html>