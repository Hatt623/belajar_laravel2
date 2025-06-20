<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // 
    public $fillable= ['name', 'slug'];

    // membuat relasi one to many ke model products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
