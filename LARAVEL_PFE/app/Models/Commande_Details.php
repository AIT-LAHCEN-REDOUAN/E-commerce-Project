<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande_Details extends Model
{
    use HasFactory;
    protected $fillable=[
        'commande_id',
        'produit_id',
        'qte',
        'prix',
    ];
}
