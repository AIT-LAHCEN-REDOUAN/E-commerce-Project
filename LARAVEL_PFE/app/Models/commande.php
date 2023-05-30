<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'firstname',
        'lastname',
        'phone',
        'address',
        'city',
        'zipcode',
        'payment_id',
        'payment_mode',
        'Date_commande'
    ];

    public function commandeDetails(){
        return $this->hasMany(Commande_Details::class,'commande_id','id');
    }
}
