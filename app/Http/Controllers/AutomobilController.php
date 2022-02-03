<?php

namespace App\Http\Controllers;

use App\Http\Resources\AutomobilCollection;
use App\Http\Resources\AutomobilResource;
use App\Models\Automobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [ 
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:5',
            'price' => 'required',
            'automobilType_id' => 'required'
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $automobil = Automobil::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'automobilType_id' => $request->automobilType_id,
            'user_id' => Auth::user()->id,
        ]);

        return response()->json(['Automobil je uspesno dodat.', new AutomobilResource($automobil)]);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:5',
            'price' => 'required',
            'automobilType_id' => 'required'
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $automobil->name = $request->name;
        $automobil->description = $request->description;
        $automobil->price = $request->price;
        $automobil->automobilType_id = $request->automobilType_id;
        $automobil->user_id = Auth::user()->id;

        $automobil->save();

        return response()->json(['Automobil je uspesno izmenjen.', new AutomobilResource($automobil)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Automobil  $automobil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Automobil $automobil)
    {
        $automobil->delete();
        return response()->json(['Automobil je uspesno obrisan.']);
    }
}
