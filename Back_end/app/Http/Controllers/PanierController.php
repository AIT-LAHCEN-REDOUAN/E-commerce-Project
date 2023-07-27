<?php

namespace App\Http\Controllers;

use App\Http\Resources\PanierCollection;
use App\Models\panier;
use App\Models\produit;
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
       
        $panier = panier::where([['produit_id', $request->produit_id], ['user_email', $request->user]])->first();
        if (isset($panier)) {
            $panier->quantity = $panier->quantity + 1;
            $panier->save();
        } else {
            $panier = panier::create([
                'user_email' => $request->user,
                'produit_id' => $request->produit_id,
                'quantity' => $request->qte
            ]);
        }

        return response()->json([
            'status' => 201,
            'message' => 'Added Successfully',
            'panier' => $panier
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($user_email)
    {
        //
        $panier = panier::where('user_email', $user_email)->get();
        return response()->json([
            'panier' => new PanierCollection($panier)
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
    public function update($cart_id, $method, $user)
    {
        //
        
        $panier = panier::where([['id', $cart_id], ['user_email', $user]])->first();
        if ($method == 'dec' and $panier->quantity > 1) {
            $panier->quantity = $panier->quantity - 1;
            $panier->save();
           
        } else if ($method == 'inc')
            $panier->quantity = $panier->quantity + 1;
            $panier->save();

        return response()->json([
            'panier' => $panier
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(panier $panier)
    {
        //
        $panier = panier::find($panier->id)->first();
        $panier->delete();
        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }
}
