<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesRequest;
use App\Models\DataThing;
use App\Models\NamaThing;
use App\Models\PenjualanDetail;
use App\Models\Penjualan;
use App\Models\Sales;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = PenjualanDetail::all();
        return view('pages.admin.sales.index',[
            'items'=>$items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $namathings = NamaThing::all();
       return view('pages.admin.sales.create', compact('namathings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $penjualan = Penjualan::create([
        ]);
        $nama = $request->nama;
        $nama = count($nama);
        
        // dd($request->all());
        for($i=0 ; $i < $nama; $i++){
            PenjualanDetail::create([
                'penjualan_id'=>$penjualan->id,
                'nama'=>$request->nama[$i],
                'jumlah'=>$request->jumlah[$i],
                'harga_jual'=>$request->harga_jual[$i],
                'keterangan'=>$request->keterangan,
                ]); 

                $DataThing = DataThing::where('nama',$request->nama[$i])->first();
                // dd($DataThing->stok);
                $DataThing->stok = $DataThing->stok - $request->jumlah[$i];
                 $DataThing->save();
            };           

        // Tinggal operasi pengurangan saat di submit yang belum

        
        return redirect()->route('penjualan.index');
        }
            
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = PenjualanDetail::findOrFail($id);
        return view('pages.admin.sales.edit',['items'=>$items]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SalesRequest $request, $id)
    {
        $items = $request->all();
        $item = PenjualanDetail::findOrFail($id);
        $jml = (int)$item->jumlah;
        $item->update($items);
        
        $jumlah = $request->jumlah;
        $jumlah = (int)$jumlah;

        $DataThing = DataThing::where('nama',$item->nama)->first();
        // dd($DataThing->stok);
        $DataThing->stok = $DataThing->stok - $jumlah +$jml;
        $DataThing->save();

         return redirect()->route('penjualan.index')->with('Status',' '.$request->input('nama').' Berhasil di Ubah');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cetakLaporan(){
        return view('pages.admin.cetaklaporan.barangkeluar');
    }

    public function cetakLaporanBarangKeluar($tglawal, $tglakhir){
        // dd(["Tanggal Awal : ".$tglawal, " Tanggal Akhir : ".$tglakhir]);

        $cetakLaporan = PenjualanDetail::whereBetween('created_at',[$tglawal,$tglakhir])->get();
        return view('pages.admin.cetaklaporan.cetakbarangkeluar',['cetakLaporan'=>$cetakLaporan]);
    }
}
