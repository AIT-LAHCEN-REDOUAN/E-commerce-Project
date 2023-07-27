<?php

namespace App\Http\Resources;

use App\Models\produit;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PanierCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $products = [];
        foreach($this->collection as $product) {

             array_push($products, [
                'id'=>$product->id,
                'user_email'=>$product->user_email,
                'produit_id'=>new ProduitResource(produit::find($product->produit_id)),
                'quantity'=>$product->quantity
              
            ]);

        }

        return $products;
    }
}
