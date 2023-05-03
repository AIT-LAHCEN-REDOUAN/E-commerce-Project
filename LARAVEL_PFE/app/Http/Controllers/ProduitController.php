<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProduitCollection;
use App\Http\Resources\ProduitResource;
use App\Models\produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $min=produit::min('prix');
       $max=produit::max('prix');
        $produit=produit::all();
        return response()->json([
            'min' => $min,
            'max' => $max,
            'produit' => new ProduitCollection($produit)
        ]);
        
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
    public function show(produit $produit)
    {
        //
        return new ProduitResource($produit);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produit $produit)
    {
        //
    }
}
