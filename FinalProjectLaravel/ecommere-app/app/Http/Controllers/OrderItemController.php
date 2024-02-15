<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Http\Requests\StoreOrderItemRequest;
use App\Http\Requests\UpdateOrderItemRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Order $order)
    {
        Order::findOrFail($order->id);

        $context = [
            "products" => Product::all(),
            "order" => $order
        ];
        return view('order.item.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Order $order)
    {
        Order::findOrFail($order->id);

        $validatedData = $request->validate([
            "product_id" => "required",
            "quantity" => "required",
            "subtotal" => "required"
        ]);

        $product_id = explode(",", $validatedData["product_id"]);
        $validatedData["product_id"] = $product_id[0];
        $validatedData["order_id"] = $order->id;

        OrderItem::create($validatedData);
        $order->update(['total' => $order->items()->sum('subtotal')]);

        return redirect()->route('order.index')->with('success', 'New order successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderItem $orderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order, OrderItem $item)
    {
        OrderItem::findOrFail($item->id);

        $context = [
            "order" => $order,
            "item" => $item
        ];

        return view('order.item.edit', $context);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order, OrderItem $item)
    {
        Order::findOrFail($order->id);
        OrderItem::findOrFail($item->id);

        $validatedData = $request->validate([
            "price" => "required",
            "quantity" => "required",
            "subtotal" => "required"
        ]);

        unset($validatedData['price']);
        $item->update($validatedData);
        $order->update(['total' => $order->items()->sum('subtotal')]);

        return redirect()->route('order.show', $order->id)->with('success', 'Item successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order, OrderItem $item)
    {
        OrderItem::findOrFail($item->id);

        $item->delete();

        return redirect()->route('order.show', $order->id)->with('success', 'Item successfully deleted');
    }
}
