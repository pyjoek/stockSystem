<?php

namespace App\Http\Controllers;

use App\Models\Vita13;
use Illuminate\Http\Request;

class Vita13Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Vita13::all();
        return view('vita13.vita13',['datas' => $datas]);
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
        $datas = new Vita13();
        $datas->stock_item = $request->stock_item;
        $datas->quantity = $request->quantity;
        $datas->price = $request->price;
        $datas->delivery_no = $request->delivery_no;
        $datas->date_recieved = $request->date_recieved;
        $datas->date_sold = $request->date_sold;
        $datas->save();
        return redirect('/vita13');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vita13  $vita13
     * @return \Illuminate\Http\Response
     */
    public function show(Vita13 $vita13)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vita13  $vita13
     * @return \Illuminate\Http\Response
     */
    public function edit(Vita13 $vita13)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vita13  $vita13
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vita13 $vita13)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vita13  $vita13
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vita13 $vita13)
    {
        //
    }
}
