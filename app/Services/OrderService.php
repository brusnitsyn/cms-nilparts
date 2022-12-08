<?php

namespace App\Services;

use App\Data\OrderData;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\OrderStatus;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderService
{
    public function store(OrderData $data) {
        $status = OrderStatus::whereId(1)->first();
        
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'order_status_id' => $status->id,
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
        $timestamp = 'invoice ' . $order->created_at;
        $filename = Str::slug($timestamp) . '.pdf';

        return $pdf->download($filename);
    }
}
