<?php

namespace App\Services;

use App\Data\OrderData;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Invoice;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerService
{
    public function store(BannerData $data) {
        $order = Order::create([
            'user_id' => auth()->user()->id,
        ]);

        foreach ($data->products as $product) {
            $orderProduct = OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product["id"],
                'quantity' => $product["quantity"]
            ]);
        }

        return $order;
    }

    public function payment() : void {

    }

    public function generatePDF(int $id)
    {
        $order = Order::whereId($id)->first();
        $user = auth()->user();
        $params = Invoice::first();

        view()->share('order', ['order' => $order, 'user' => $user, 'params' => $params]);
        $pdf = PDF::loadView('order', ['order' => $order, 'user' => $user, 'params' => $params]);
        $filename = 'invoice_' . $order->created_at . '.pdf';

        return $pdf->download($filename);
    }
}
