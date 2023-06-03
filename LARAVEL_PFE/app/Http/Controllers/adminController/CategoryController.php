<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\Models\categorie;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=categorie::all();
        return view("categorie/show",["data"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("categorie/add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = categorie::create([
            "categorie"=>strip_tags($request["categorie"])
        ]);
        $data->save();
        return redirect()->route("category.create")->withSuccess("Added Succesfully !!");
        

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorie = categorie::find($id);
        return view("categorie/edit",["data"=>$categorie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = categorie::find($id);
        $category->categorie = strip_tags($request["categorie"]);
        return redirect()->route("category.index")->with("update_success",true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categorie = categorie::find($id);
        $categorie->delete();
        return redirect()->route("category.index")->with("delete_success",true);
    }
}
