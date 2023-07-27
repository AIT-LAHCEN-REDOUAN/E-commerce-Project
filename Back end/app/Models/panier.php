<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class panier extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_email',
        'produit_id',
        'quantity',
        'total'
    ];

    public function produit():BelongsTo{
        return $this->belongsTo(produit::class);
    }
}
