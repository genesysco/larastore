<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'short_description', 'description', 'price', 'stock', 'category_id', 'subCategory_id'];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'subCategory_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
} 