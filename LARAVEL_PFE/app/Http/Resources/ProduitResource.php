<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProduitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'prix'=>$this->prix,
            'description'=>$this->description,
            'image_id'=>$this->image,
            'type_id'=>$this->type,
            'marque_id'=>$this->marque,
            'promotion'=>$this->promotion
        ];
    }
}
