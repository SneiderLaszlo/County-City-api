<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\County;

class CountyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $counties = County::with('cities')->get();
    return response()->json([
        'counties' => $counties,
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('counties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $county = County::create($request->all());

    return response()->json([
        'county' => $county,
    ]);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(County $county)
    {
        return view('counties.edit', compact('county'));
    }

    public function update(Request $request, $id)
{
    $county = County::findOrFail($id);
    $county->update($request->all());

    return response()->json([
        'county' => $county,
    ]);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $county = County::findOrFail($id);
    $county->delete();

    return response()->json([
        'message' => 'County deleted',
    ]);
}
}
