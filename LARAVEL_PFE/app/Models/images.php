<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class images extends Model
{
    use HasFactory;
    protected $fillable = ["image","produit_id"];

    public function produit():BelongsTo{
        return $this->belongsTo(produit::class);
    }
}
