<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $guarded = [];

    use HasFactory;

    public function reviews(){
        # code
        return $this->hasMany(Review::class);
    }
}
