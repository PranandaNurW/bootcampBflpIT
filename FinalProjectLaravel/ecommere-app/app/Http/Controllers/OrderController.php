<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $context = [
            "orders" => Order::all()
        ];
        return view('order.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $context = [
            "users" => User::all(),
        ];
        return view('order.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $validatedData = $request->all();
        $validatedData["invoice"] = Str::uuid();
        $validatedData["total"] = 0;

        Order::create($validatedData);

        return redirect()->route('order.index')->with('success', 'New order successfully created');
    }
    
    public function itemCreate(Order $order) {
        Order::findOrFail($order->id);

        $context = [
            "products" => Product::all(),
            "order" => $order
        ];
        return view('order.item-create', $context);
    }

    public function itemStore(Request $request, Order $order) {
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
    public function show(Order $order)
    {
        Order::findOrFail($order->id);

        $context = [
            "order" => $order
        ];
        return view('order.show', $context);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
