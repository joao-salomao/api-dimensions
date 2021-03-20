<?php

namespace App\Http\Controllers;

use App\Dimension;
use App\Http\Requests\CreateDimensionRequest;
use App\Http\Requests\UpdateDimensionRequest;

class DimensionController extends Controller
{
    public function index()
    {
        $dimensions = Dimension::with('questions')->orderBy('title')->get();
        return response()->json($dimensions);
    }


    public function store(CreateDimensionRequest $request)
    {
        $data = $request->all();
        $dimension = Dimension::create($data);
        return response()->json($dimension);
    }


    public function show(Dimension $dimension)
    {
        return response()->json($dimension);
    }


    public function update(UpdateDimensionRequest $request, Dimension $dimension)
    {
        $data = $request->all();
        $dimension->fill($data)->save();
        return response()->json($dimension);
    }


    public function destroy(Dimension $dimension)
    {
        if ($dimension->questions->count() > 0) {
            return response()->json(["message" => "The dimension cannot be deleted because she has questions related"], 403);
        }
        return response()->json(['deleted' => $dimension->delete()]);
    }
}
