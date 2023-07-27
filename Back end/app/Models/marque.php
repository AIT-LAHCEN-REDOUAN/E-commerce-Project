<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class marque extends Model
{
    use HasFactory;
    protected $fillable = ["marque","image"];

    public function produits():HasMany{
        return $this->hasMany(produit::class);
    }
}
