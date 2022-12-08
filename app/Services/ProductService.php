<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Data\ProductData;
use App\Models\Attachment;
use App\Models\OrgUser;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductService
{
    public function store(ProductData $data)
    {
        /*
         *  Создание товара
         */

        // Пользователь компании
        // $orgUser = OrgUser::where('user_id', Auth::user()->id)->first();
        // $user = auth()->user();

        $product = new Product();
        $product->name = $data->name;
        $product->slug = Str::slug($data->name);

        if ($data->article)
            $product->article = $data->article;

        if ($data->manufacturer)
            $product->manufacturer = $data->manufacturer;

        if ($data->machines)
            $product->machines = $data->machines;

        if ($data->full_description)
            $product->full_description = $data->full_description;
        // else $product->desc = $data->toJson();
        if (strlen($data->short_description) > 0)
            $product->short_description = $data->short_description;

        $product->in_stock = $data->in_stock;
        $product->price = (float)$data->price;
        $product->pub_user_id = auth()->id();
        // $product->unit_id = $data->unit_id;
        $product->category_id = $data->category_id;
        // $product->pub_org_id = $orgUser->org_id;

        $product->save();

        // Uploading images
        if ($data->images)
            $product->uploadFiles($data->images, 'products', true);

        return $product;
    }

    public function update(ProductData $data, Product $product)
    {
        /*
         * Обновить товар
         */

//        dd($data);

//        $oldImages = $product->images;
//        if ($data->images) {
//            foreach ($data->images as $image) {
//                $uploadedImagePaths = $product->upload($image, 'public', 'products', true);
//                foreach ($uploadedImagePaths as $item) {
//                    $attachmentImage = new Attachment();
//                    $attachmentImage->name = $item->filename;
//                    $attachmentImage->type = $item->image->mime();
//                    $attachmentImage->url = env('APP_URL') . "/storage/" . $item->path;
//                    $attachmentImage->is_published = true;
//
//                    $product->attachments()->save($attachmentImage);
//                }
//            }
//        }

        $product->update([
            'name' => $data->name,
            'article' => $data->article,
            'manufacturer' => $data->manufacturer,
            'machines' => $data->machines,
            'desc' => $data->desc,
            'price' => (float)$data->price,
            'in_stock' => $data->in_stock,
            'category_id' => $data->categoryId,
        ]);

        // Uploading images
        if ($data->images)
            $product->uploadFiles($data->images, 'products', true);

        return $product;
    }
}
