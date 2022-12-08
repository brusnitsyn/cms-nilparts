<?php

namespace App\Data;

use App\Casts\ObjectData;
use Illuminate\Http\Request;

final class OrderData extends ObjectData
{
    public ?array $products;

    public static function fromRequest(
        Request $request
    ): OrderData {
        return new OrderData(
            products: $request->get('products'),
        );
    }
}
