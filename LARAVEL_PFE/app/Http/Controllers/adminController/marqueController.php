<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\Models\marque;
use Illuminate\Http\Request;

class marqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=marque::all();
        return view("marque/show",["data"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("marque/add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->has('images')){
        $marque = new marque();
        $marque->marque = $request->marque;
        $marque->image = $request->images->move('Images/marque',$request->images->getClientOriginalName());
        $marque->save();
        return redirect()->route("marque.create")->withSuccess("Added Successfully!");        
      
        }
        
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
        $marque = marque::find($id);
        return view("marque/edit",["data"=>$marque]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $marque = marque::find($id);
        $marque->marque = strip_tags($request["marque"]);
        return redirect()->route("marque.index")->with("update_success",true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $marque = marque::find($id);
        $marque->delete();
        return redirect()->route("category.index")->with("delete_success",true);
    }
}
