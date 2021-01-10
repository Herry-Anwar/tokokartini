<?php

namespace App\Http\Controllers;

use App\Models\NamaThing;
use App\Models\Pembelian;
use App\Models\PenjualanDetail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.admin.dashboard',[
            'nama_thing'=>NamaThing::count(),
            'pembelian'=>Pembelian::count(),
            'penjualanDetail'=>PenjualanDetail::count()
        ]);
    }

   
}
