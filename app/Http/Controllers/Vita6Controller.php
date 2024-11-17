<?php

namespace App\Http\Controllers;

use App\Models\Vita6;
use Illuminate\Http\Request;

class Vita6Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Vita6::all();
        return view('vita6.vita6',['datas' => $datas]);
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
        $datas = new Vita6();
        $datas->stock_item = $request->stock_item;
        $datas->quantity = $request->quantity;
        $datas->price = $request->price;
        $datas->delivery_no = $request->delivery_no;
        $datas->date_recieved = $request->date_recieved;
        $datas->date_sold = $request->date_sold;
        $datas->save();
        return redirect('/vita6');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vita6  $vita6
     * @return \Illuminate\Http\Response
     */
    public function show(Vita6 $vita6)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vita6  $vita6
     * @return \Illuminate\Http\Response
     */
    public function edit(Vita6 $vita6)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vita6  $vita6
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vita6 $vita6)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vita6  $vita6
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vita6 $vita6)
    {
        //
    }
}
