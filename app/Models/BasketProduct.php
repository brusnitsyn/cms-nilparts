<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class BasketProduct extends Model
{
    use HasFactory;

    protected $table = 'basket_product';

    protected $fillable = [
        'quantity',
        'basket_id',
        'product_id'
    ];

    public function product() {
        return $this->belognsTo(Product::class, 'product_id');
    }
}
