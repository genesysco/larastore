<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;


    protected $fillable = ['user_id', 'is_ordered'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_items')
                    ->withPivot('quantity', 'price');
    }

    public static function getCart()
    {
        return static::firstOrCreate(
            ['user_id' => auth()->id(), 'is_ordered' => false]
        );
    }
}
