<?php

namespace App\Http\Controllers;

use App\Models\Vita9;
use Illuminate\Http\Request;

class Vita9Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Vita9::all();
        return view('vita9.vita9',['datas' => $datas]);
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
        $datas = new Vita9();
        $datas->stock_item = $request->stock_item;
        $datas->quantity = $request->quantity;
        $datas->price = $request->price;
        $datas->delivery_no = $request->delivery_no;
        $datas->date_recieved = $request->date_recieved;
        $datas->date_sold = $request->date_sold;
        $datas->save();
        return redirect('/vita9');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vita9  $vita9
     * @return \Illuminate\Http\Response
     */
    public function show(Vita9 $vita9)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vita9  $vita9
     * @return \Illuminate\Http\Response
     */
    public function edit(Vita9 $vita9)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vita9  $vita9
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vita9 $vita9)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vita9  $vita9
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vita9 $vita9)
    {
        //
    }
}
