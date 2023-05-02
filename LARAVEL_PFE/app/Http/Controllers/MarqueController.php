<?php

namespace App\Http\Controllers;

use App\Models\marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $marque=marque::all();
        return response()->json($marque);
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
    public function show(marque $marque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(marque $marque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, marque $marque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(marque $marque)
    {
        //
    }
}
