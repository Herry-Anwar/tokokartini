<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataThingRequest;
use App\Models\DataThing;
use App\Models\NamaThing;
use Illuminate\Http\Request;

class DataThingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DataThing::all();
        return view('pages.admin.data.index',[
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
        return view('pages.admin.data.create', compact('namathings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataThingRequest $request)
    {
        $data = $request->all();
        DataThing::create($data);
        return redirect()->route('data.index')->with('Status',' '.$request->input('nama').' Berhasil ditambah');
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
        $item = DataThing::findOrFail($id);
        return view('pages.admin.data.edit',[
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
        $item = DataThing::findOrFail($id);
        $item->update($data);
        return redirect()->route('data.index')->with('Status','Data Berhasil diubah');
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
