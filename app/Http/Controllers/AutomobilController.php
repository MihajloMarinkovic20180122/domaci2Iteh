<?php

namespace App\Http\Controllers;

use App\Http\Resources\AutomobilCollection;
use App\Http\Resources\AutomobilResource;
use App\Models\Automobil;
use Illuminate\Http\Request;

class AutomobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $automobils = Automobil::all();
        return new AutomobilCollection($automobils);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Automobil  $automobil
     * @return \Illuminate\Http\Response
     */
    public function show(Automobil $automobil)
    {
        return new AutomobilResource($automobil);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Automobil  $automobil
     * @return \Illuminate\Http\Response
     */
    public function edit(Automobil $automobil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Automobil  $automobil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Automobil $automobil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Automobil  $automobil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Automobil $automobil)
    {
        //
    }
}
