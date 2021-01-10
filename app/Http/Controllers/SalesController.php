<?php

namespace App\Http\Controllers;

use App\Models\NamaThing;
use App\Models\Sales;
use App\Models\KodeSales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items = Sales::all()->orderBy('created_at','desc');
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
         $this->validate($request, [
             'id_penjualan'=>'required|integer',
             'nama'=>'required|max:255',
             'jumlah'=>'required|integer',
             'keterangan'=>'max:255'
         ]);

        // $kode = KodeSales::create([
        //     'kode_sales'=>$request->kode_sales
        // ]);

        // $jumlah = count($request->jumlah);
        // for($i=0; $i < $jumlah; $i++){
        //     Sales::create([
        //         'id_penjualan'=> $kode->id,
        //         'nama'=>$request->nama[$i],
        //         'jumlah'=>$request->jumlah[$i],
        //         'keterangan'=>$request->keterangan
        //     ]);
        // }


        $data = $request->all();
        Sales::create($data);
        return redirect()->route('sales.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
