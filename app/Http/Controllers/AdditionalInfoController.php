<?php

namespace App\Http\Controllers;

use App\Models\AdditionalInfo;
use App\Http\Requests\StoreAdditionalInfoRequest;
use App\Http\Requests\UpdateAdditionalInfoRequest;

class AdditionalInfoController extends Controller
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
     * @param  \App\Http\Requests\StoreAdditionalInfoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdditionalInfoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdditionalInfo  $additionalInfo
     * @return \Illuminate\Http\Response
     */
    public function show(AdditionalInfo $additionalInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdditionalInfo  $additionalInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(AdditionalInfo $additionalInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdditionalInfoRequest  $request
     * @param  \App\Models\AdditionalInfo  $additionalInfo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdditionalInfoRequest $request, AdditionalInfo $additionalInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdditionalInfo  $additionalInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdditionalInfo $additionalInfo)
    {
        //
    }
}
