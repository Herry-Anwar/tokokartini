<?php

namespace App\Http\Controllers;

use App\Http\Requests\NamaThingRequest;
use App\Models\NamaThing;
use Illuminate\Http\Request;

class NamaThingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = NamaThing::all();
        return view('pages.admin.barang.index',[
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
        return view('pages.admin.barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NamaThingRequest $request)
    {
        $data = $request->all();
        NamaThing::create($data);
        return redirect()->route('barang.index')->with('Status',' '.$request->input('nama').' Berhasil ditambah');
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
        $item = NamaThing::findOrFail($id);
        return view('pages.admin.barang.edit',[
            'item'=>$item
        ]);
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
        $data = $request->all();
        NamaThing::findOrFail($id)->update($data);
        return redirect()->route('barang.index')->with('Status',' '.$request->input('nama').' Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = NamaThing::findOrFail($id);
        $item->delete();
        return redirect()->route('barang.index');
    }
}
