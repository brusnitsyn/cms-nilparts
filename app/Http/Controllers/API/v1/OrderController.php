<?php

namespace App\Http\Controllers\API\v1;

use App\Data\OrderData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderStoreRequest;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  OrderStoreRequest  $request
     * @return OrderResource
     */
    public function store(OrderStoreRequest $request, OrderService $service)
    {
        $order = $service->store(OrderData::fromRequest($request));

        return OrderResource::make($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  Order  $id
     * @return OrderResource
     */
    public function show(Order $order)
    {
        $order = $order->loadRelationships(request('with'));
        return OrderResource::make($order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function download($id, OrderService $service) {
        $pdf = $service->generatePDF($id);

        return $pdf;
    }
}
