<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($categorie)
    {
        //
        $cat=categorie::where('categorie',$categorie)->first()->id;
        $type=type::where('categorie_id',$cat)->get();
        return response()->json($type);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, type $type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(type $type)
    {
        //
    }
}
