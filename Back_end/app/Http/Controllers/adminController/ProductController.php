<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\Models\images;
use App\Models\produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = DB::table("produits")
        ->Join("images", "produits.id", "=", "images.produit_id")
        ->Join("categories","produits.categorie_id","=","categories.id")
        ->Join("marques","produits.marque_id","=","marques.id")
        ->Join("types","produits.type_id","=","types.id")
        ->select(
            "produits.id",
            "produits.title",
            "produits.description",
            "produits.prix",

            "images.image",
            "categories.categorie",
            "marques.marque",
            "types.type",

            "produits.promotion",
            "produits.quantity_stock",
        )
        ->distinct()
        ->get();


        //var_dump($product);
        return view("produit/show",["product"=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $get_categorie = DB::select("SELECT * FROM categories");
        $get_type = DB::select("SELECT * FROM types");
        $get_marque = DB::select("SELECT * FROM marques");
        return view("produit/add",["categorie"=>$get_categorie,"type"=>$get_type,"marque"=>$get_marque]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data1 = produit::create([
        "title"=>strip_tags($request->input("title")),
        "prix"=>strip_tags($request->input("price")),
        "description"=>strip_tags($request->input("Description")),
        "categorie_id"=>$request->Categorie,
        "type_id"=>$request->type,
        "marque_id"=>$request->marque,
        "promotion"=>strip_tags($request->input("discount")),
        "quantity_stock"=>strip_tags($request->input("stock"))
       ]);
       $id = $data1->id;
       $data1->save();


       foreach ($request->file('images') as $file) {
        $image = new images();
        $image->image = $file->move('Images/product',$file->getClientOriginalName());
        $image->produit_id=$id;
        $image->save();
    }
       return redirect()->route("product.create")->withSuccess("Added Succesfully");




    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $get_categorie = DB::select("SELECT * FROM categories");
        $get_type = DB::select("SELECT * FROM types");
        $get_marque = DB::select("SELECT * FROM marques");
        $product = produit::find($id);
        //dd($marque);
        return view("produit/edit",["data"=>$product,"categorie"=>$get_categorie,"type"=>$get_type,"marque"=>$get_marque]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $product = produit::find($id);
    $product->title = $request->title;
    $product->prix = $request->price;
    $product->description = $request->Description;
    $product->categorie_id = $request->Categorie;
    $product->type_id = $request->type;
    $product->marque_id = $request->marque;
    $product->promotion = $request->discount;
    $product->quantity_stock = $request->stock;

    if ($request->hasFile('images')) {
        // Delete the existing image files
        $images = images::where('produit_id', $id)->get();
        foreach ($images as $image) {
            // Remove the file from storage
            Storage::delete($image->image);
            $image->delete();
        }

        // Upload and store the new image files
        foreach ($request->file('images') as $file) {
            $image = new images();
            $imageName = $file->getClientOriginalName();
            $file->move('public/Images/product', $imageName);
            $image->image = 'public/Images/product/' . $imageName;
            $image->produit_id = $id;
            $image->save();
        }

    }
    $product->save();
    return redirect()->route("product.index")->with("update_success", true);

}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produit = produit::find($id);
        $produit->delete();
        return redirect()->route("product.index")->with("delete_success",true);
    }
}
