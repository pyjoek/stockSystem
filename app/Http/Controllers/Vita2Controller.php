<?php

namespace App\Http\Controllers;

use App\Models\Vita2;
use Illuminate\Http\Request;

class Vita2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Vita2::all();
        return view('vita2.vita2',['datas' => $datas]);
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
        $datas = new Vita2();
        $datas->stock_item = $request->stock_item;
        $datas->quantity = $request->quantity;
        $datas->price = $request->price;
        $datas->delivery_no = $request->delivery_no;
        $datas->date_recieved = $request->date_recieved;
        $datas->date_sold = $request->date_sold;
        $datas->save();
        return redirect('/vita2');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vita2  $vita2
     * @return \Illuminate\Http\Response
     */
    public function show(Vita2 $vita2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vita2  $vita2
     * @return \Illuminate\Http\Response
     */
    public function edit(Vita2 $vita2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vita2  $vita2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vita2 $vita2)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vita2  $vita2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vita2 $vita2)
    {
        //
    }
}
