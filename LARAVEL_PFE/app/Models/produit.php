<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class produit extends Model
{
    use HasFactory;
    protected $fillable=['id','title','prix','description','image_id','type_id','marque_id','promotion'];

    public function categorie():BelongsTo{
        return $this->belongsTo(categorie::class);
    }
    public function type():BelongsTo{
        return $this->belongsTo(type::class);
    }
    public function images():HasMany{
        return $this->HasMany(images::class);
    }
    public function marque():BelongsTo{
        return $this->belongsTo(marque::class);
    }
}
