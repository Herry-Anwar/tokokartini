<?php

namespace App\Http\Controllers;

use App\Http\Requests\PembelianRequest;
use App\Models\DataThing;
use App\Models\NamaThing;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Pembelian::all();
        return view('pages.admin.pembelian.index',[
            'items'=>$items
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
        return view('pages.admin.pembelian.create',compact('namathings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'kode_beli'=>'required|integer',
            'nama'=>'required|max:255',
            'jumlah'=>'required|integer',
            'supplier'=>'required|max:255'
        ]);
        $items = new Pembelian();
        $items->kode_beli = $request->kode_beli; 
        $items->nama = $request->nama; 
        $items->jumlah = $request->jumlah; 
        $items->supplier = $request->supplier; 
        $items->save();

        $jumlah = $items->jumlah;
        $DataThing = DataThing::where('nama',$request->nama)->first();
        // $DataThing = DB::table('data_things')->select('stok')->where('nama',$items->nama);
        // $DataThing = DB::select('select stok from data_things where nama = ?',array($items->nama));
        $jumlah = (int)$jumlah;
        $DataThing->stok += $jumlah;
        $DataThing->save();
        return redirect()->route('pembelian.index')->with('Status',' '.$request->input('nama').' Berhasil ditambah');
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
        $items = Pembelian::findOrFail($id);
        return view('pages.admin.pembelian.edit',[
            'items'=>$items
        ]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PembelianRequest $request, $id)
    {
        // $this->validate($request,[
        //     'kode_beli'=>'integer',
        //     'nama'=>'max:255',
        //     'jumlah'=>'required|integer',
        //     'supplier'=>'required|max:255'
        // ]);
        // $items = new Pembelian();
        // $items->kode_beli = $request->kode_beli; 
        // $items->nama = $request->nama; 
        // $items->jumlah = $request->jumlah; 
        // $items->supplier = $request->supplier; 
        $items = $request->all();
        $item = Pembelian::findOrFail($id);
        $jml = (int)$item->jumlah; // Memanggil nilai jumlah sebelumnya
        $item -> update($items);

        $jumlah = $request->jumlah; // Memanggil nilai jumlah yang di ubah
        $jumlah = (int)$jumlah;
        //dd($jumlah);
        // dd($jml);
        // $DataThing = DataThing::find($id)->increment('stok',$jumlah);
        $DataThing = DataThing::where('nama',$item->nama)->first();
        $DataThing->stok = $DataThing->stok + $jumlah - $jml;
        //dd($DataThing->stok);
        $DataThing->save();

        return redirect()->route('pembelian.index')->with('Status',' '.$request->input('nama').' Berhasil di Ubah');
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
        return view('pages.admin.cetaklaporan.barangmasuk');
    }

    public function cetakLaporanBarangMasuk($tglawal, $tglakhir){
        // dd(["Tanggal Awal : ".$tglawal, " Tanggal Akhir : ".$tglakhir]);

        $cetakLaporan = Pembelian::whereBetween('created_at',[$tglawal,$tglakhir])->get();
        return view('pages.admin.cetaklaporan.cetakbarangmasuk',['cetakLaporan'=>$cetakLaporan]);
    }
}
