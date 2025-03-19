<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_size')->withPivot('quantity');
    }

}
