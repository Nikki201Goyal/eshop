<?php

namespace App\Http\Controllers;

use App\Models\query;
use App\Http\Requests\StorequeryRequest;
use App\Http\Requests\UpdatequeryRequest;

class QueryController extends Controller
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
     * @param  \App\Http\Requests\StorequeryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorequeryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\query  $query
     * @return \Illuminate\Http\Response
     */
    public function show(query $query)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\query  $query
     * @return \Illuminate\Http\Response
     */
    public function edit(query $query)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatequeryRequest  $request
     * @param  \App\Models\query  $query
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatequeryRequest $request, query $query)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\query  $query
     * @return \Illuminate\Http\Response
     */
    public function destroy(query $query)
    {
        //
    }
}
