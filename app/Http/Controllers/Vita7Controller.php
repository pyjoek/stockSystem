<?php

namespace App\Http\Controllers;

use App\Models\Vita7;
use Illuminate\Http\Request;

class Vita7Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Vita7::all();
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
        $datas = new Vita7();
        $datas->stock_item = $request->stock_item;
        $datas->quantity = $request->quantity;
        $datas->price = $request->price;
        $datas->delivery_no = $request->delivery_no;
        $datas->date_recieved = $request->date_recieved;
        $datas->date_sold = $request->date_sold;
        $datas->save();
        return redirect('/vita7');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vita7  $vita7
     * @return \Illuminate\Http\Response
     */
    public function show(Vita7 $vita7)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vita7  $vita7
     * @return \Illuminate\Http\Response
     */
    public function edit(Vita7 $vita7)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vita7  $vita7
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vita7 $vita7)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vita7  $vita7
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vita7 $vita7)
    {
        //
    }
}
