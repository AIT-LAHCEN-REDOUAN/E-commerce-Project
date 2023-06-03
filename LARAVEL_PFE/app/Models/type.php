<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class type extends Model
{
    
    use HasFactory;
    protected $fillable=["id","type","categorie_id"];

    public function categorie():BelongsTo{
        return $this->belongsTo(categorie::class);
    }

    public function produits():HasMany{
        return $this->hasMany(produit::class);
    }
}
