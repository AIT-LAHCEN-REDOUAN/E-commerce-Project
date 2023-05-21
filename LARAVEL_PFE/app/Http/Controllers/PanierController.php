<?php

namespace App\Http\Controllers;

use App\Http\Resources\PanierCollection;
use App\Models\panier;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       
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
        $panier=panier::where([['produit_id',$request->produit_id],['user_email',$request->user]])->first();
        if(isset($panier)){
            $panier->quantity=$panier->quantity+1;
            $panier->save();
        }
        else
        {
                    $panier=panier::create([
                        'user_email'=>$request->user,
                        'produit_id'=>$request->produit_id
                    ]);
        }
       
        return response()->json([
            'message'=>'Added Successfully',
            'produit'=>$panier
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($user_email)
    {
        //
        $panier=panier::where('user_email',$user_email)->get();
        return response()->json([
            'panier'=>new PanierCollection($panier)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(panier $panier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, panier $panier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(panier $panier)
    {
        //
    }
}
