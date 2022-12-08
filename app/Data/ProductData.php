<?php

namespace App\Data;

use App\Casts\ObjectData;
use Illuminate\Http\Request;

final class ProductData extends ObjectData
{
    public ?string $name;
    public ?string $article;
    public ?string $manufacturer;
    public ?int $category_id;
    public ?string $machines;
    public ?string $short_description;
    public ?string $full_description;
    public ?float $price;
    public ?array $images;
    // public ?float $nds;
    // public ?int $cost_per;
    public ?bool $in_stock;
    // public ?int $unit_id;

    public static function fromRequest(
        Request $request
    ): ProductData {
        return new ProductData(
            name: $request->get('name'),
            article: $request->get('article'),
            manufacturer: $request->get('manufacturer'),
            machines: $request->get('machines'),
            category_id: (int) $request->get('category_id'),
            short_description: $request->get('short_description'),
            full_description: $request->get('full_description'),
            price: $request->get('price'),
            images: $request->file('images'),
            // nds: $request->get('nds'),
            // cost_per: $request->get('cost_per'),
            in_stock: $request->get('in_stock'),
            // unit_id: $request->get('unit_id')
        );
    }

//    public static function fromArray(array $array)
//    {
//        return new static($array);
//    }
//
    public static function fromArray(
        array $array
    ): ProductData {
        return new static($array);
    }
}
