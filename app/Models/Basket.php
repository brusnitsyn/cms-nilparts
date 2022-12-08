<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\BasketProduct;
use App\Models\Product;
use App\Traits\WithRelationships;
use Illuminate\Database\Query\Builder;

class Basket extends Model
{
    use HasFactory, WithRelationships;

    protected static $relationships = [
        'user',
        'products',
    ];

    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('id', 'quantity');
    }

    public function scopeTotalPrice()
    {
        $price = 0;
        foreach ($this->products as $key => $product) {
            $price += (float)$product->price * $product->pivot->quantity;
        }

        return number_format($price, 2, '.', '');
    }
}
