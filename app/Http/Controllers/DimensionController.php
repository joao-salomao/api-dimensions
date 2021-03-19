<?php

namespace App\Http\Controllers;

use App\Dimension;
use Illuminate\Http\Request;

class DimensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dimensions = Dimension::get();
        return response()->json($dimensions);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $dimension = Dimension::create($data);
        return response()->json($dimension);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dimension  $dimension
     * @return \Illuminate\Http\Response
     */
    public function show(Dimension $dimension)
    {
        return response()->json($dimension);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dimension  $dimension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dimension $dimension)
    {
        $data = $request->all();
        $dimension->fill($data)->save();
        return response()->json($dimension);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dimension  $dimension
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dimension $dimension)
    {
        return response()->json(['deleted' => $dimension->delete()]);
    }
}
