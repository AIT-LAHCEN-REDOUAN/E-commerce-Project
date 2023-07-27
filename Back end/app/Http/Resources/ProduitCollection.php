<?php

namespace App\Http\Resources;

use App\Models\produit;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProduitCollection extends ResourceCollection
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
                'title'=>$product->title,
                'prix'=>$product->prix,
                'description'=>$product->description,
                'image_id'=>$product->images,
                'categorie_id'=>$product->categorie,
                'type_id'=>$product->type,
                'marque_id'=>$product->marque,
                'promotion'=>$product->promotion,
            ]);

        }

        return $products;
    }
}
