<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\County;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
{
    $cities = City::with('county')->get();
    return response()->json([
        'cities' => $cities,
    ]);
}

    public function create()
    {
        $counties = County::all();

        return view('cities.create', compact('counties'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'county_id' => 'required|exists:counties,id',
    ]);

    $city = City::create($request->all());

    return response()->json([
        'city' => $city,
    ]);
}

    public function show(City $city)
    {
        return view('cities.show', compact('city'));
    }

    public function edit(City $city)
{
    $counties = County::orderBy('name')->get();

    return view('cities.edit', compact('city', 'counties'));
}

    public function update(Request $request, $id)
{
    $city = City::findOrFail($id);
    $city->update($request->all());

    return response()->json([
        'city' => $city,
    ]);
}
    public function destroy($id)
{
    $city = City::findOrFail($id);
    $city->delete();

    return response()->json([
        'message' => 'City deleted',
    ]);
}
}