<?php

namespace App\Http\Controllers;

use App\Models\Vita8;
use Illuminate\Http\Request;

class Vita8Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Vita8::all();
        return view('vita8.vita8',['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = new Vita8();
        $datas->stock_item = $request->stock_item;
        $datas->quantity = $request->quantity;
        $datas->price = $request->price;
        $datas->delivery_no = $request->delivery_no;
        $datas->date_recieved = $request->date_recieved;
        $datas->date_sold = $request->date_sold;
        $datas->save();
        return redirect('/vita8');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vita8  $vita8
     * @return \Illuminate\Http\Response
     */
    public function show(Vita8 $vita8)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vita8  $vita8
     * @return \Illuminate\Http\Response
     */
    public function edit(Vita8 $vita8)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vita8  $vita8
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vita8 $vita8)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vita8  $vita8
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vita8 $vita8)
    {
        //
    }
}
