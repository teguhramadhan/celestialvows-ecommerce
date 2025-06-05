<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
    ];

    public function variants()
    {
      return $this->hasMany(ProductVariant::class);
    }

    public function images()
    {
      return $this->hasMany(ProductImage::class);
    }

}
