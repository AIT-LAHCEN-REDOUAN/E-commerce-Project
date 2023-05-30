<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("produit/show");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $get_categorie = DB::select("SELECT categorie FROM categories");
        $get_type = DB::select("SELECT `type` FROM types");
        $get_marque = DB::select("SELECT marque FROM marques");
        return view("produit/add",["categorie"=>$get_categorie,"type"=>$get_type,"marque"=>$get_marque]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        print_r($request);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
