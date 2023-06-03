<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\Models\type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = type::all();
        return view("type/show",["data"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $get_categories = DB::select("SELECT categorie FROM categories");
        return view("type/add",["data"=>$get_categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categorie = strip_tags($request["categorie"]);
        $id_categorie = DB::select("SELECT id FROM categories WHERE categorie =?",[$categorie]);
        $type = strip_tags($request["type"]);       
        $data = type::create([
            "type"=>$type,
            "categorie_id"=>$id_categorie[0]->id
        ]);
        $data->save();
        return redirect()->route("category.create")->withSuccess("Added Succesfully !!");
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
