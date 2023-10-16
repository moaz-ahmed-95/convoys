<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConvoyRequest;
use App\Http\Requests\UpdateConvoyRequest;
use App\Models\Convoy;

class ConvoyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreConvoyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConvoyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convoy  $convoy
     * @return \Illuminate\Http\Response
     */
    public function show(Convoy $convoy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Convoy  $convoy
     * @return \Illuminate\Http\Response
     */
    public function edit(Convoy $convoy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConvoyRequest  $request
     * @param  \App\Models\Convoy  $convoy
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConvoyRequest $request, Convoy $convoy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Convoy  $convoy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convoy $convoy)
    {
        //
    }
}
