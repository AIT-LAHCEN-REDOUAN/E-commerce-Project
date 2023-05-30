<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\Models\images;
use App\Models\produit;
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
        $get_categorie_nom = strip_tags($request["Categorie"]);
        $get_type_nom = strip_tags($request["type"]);
        $get_marque_nom = strip_tags($request["marque"]);

        $get_categorie_id = DB::select("SELECT id FROM categories WHERE `categorie`=?",[$get_categorie_nom]);
        $get_type_id = DB::select("SELECT id FROM types WHERE `type` = ?",[$get_type_nom]);
        $get_marque_id = DB::select("SELECT id FROM marques WHERE `marque` = ?",[$get_marque_nom]);
    /*
        var_dump($get_categorie_nom);
        echo "<br>";
        echo "<br>";
        var_dump($get_type_nom);
        echo "<br>";
        echo "<br>";
        var_dump($get_marque_nom);
        echo "<br>";
        echo "<br>";
        var_dump($get_categorie_id[0]->id);
        echo "<br>";
        echo "<br>";
        var_dump($get_marque_id[0]->id);
        echo "<br>";
        echo "<br>";
        var_dump($get_type_id[0]->id);*/


        $data1 = produit::create([
        "title"=>strip_tags($request->input("title")),
        "prix"=>strip_tags($request->input("price")),
        "description"=>strip_tags($request->input("Description")),
        "categorie_id"=>$get_categorie_id[0]->id,
        "type_id"=>$get_type_id[0]->id,
        "marque_id"=>$get_marque_id[0]->id,
        "promotion"=>strip_tags($request->input("discount")),
        "quantity_stock"=>strip_tags($request->input("stock"))
       ]); 
       $data1->save();
       return redirect()->route("product.create")->withSuccess("Added Succesfully");
    }
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
