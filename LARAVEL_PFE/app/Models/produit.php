<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class produit extends Model
{
    use HasFactory;
    public function type():BelongsTo{
        return $this->belongsTo(type::class);
    }
    public function image():BelongsTo{
        return $this->belongsTo(images::class);
    }
    public function marque():BelongsTo{
        return $this->belongsTo(marque::class);
    }
}
