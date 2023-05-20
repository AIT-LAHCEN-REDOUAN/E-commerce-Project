<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compte extends Model
{
    use HasFactory;
    protected $fillable=['name','telephone','adresse','code_postal','pays','region','user_email'];
}
