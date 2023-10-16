<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAidTypeRequest;
use App\Http\Requests\UpdateAidTypeRequest;
use App\Models\AidType;

class AidTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreAidTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAidTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AidType  $aidType
     * @return \Illuminate\Http\Response
     */
    public function show(AidType $aidType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AidType  $aidType
     * @return \Illuminate\Http\Response
     */
    public function edit(AidType $aidType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAidTypeRequest  $request
     * @param  \App\Models\AidType  $aidType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAidTypeRequest $request, AidType $aidType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AidType  $aidType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AidType $aidType)
    {
        //
    }
}
