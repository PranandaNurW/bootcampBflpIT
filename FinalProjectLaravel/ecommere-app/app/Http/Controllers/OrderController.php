<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function report()
    {
        $context = [
            "orders" => Order::all()
        ];
        return view('order.report', $context);
    }

    public function reportDownload()
    {
        $context = [
            "orders" => Order::all()
        ];

        $pdf = Pdf::loadView('order.pdf.template', $context);
        return $pdf->stream();
        // return $pdf->download('order_report.pdf');   
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
        Order::findOrFail($order->id);

        $context = [
            "order" => $order
        ];
        return view('order.edit', $context);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        Order::findOrFail($order->id);
        $validatedData = $request->all();

        $order->update($validatedData);

        return redirect()->route('order.index')->with('success', 'Order successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        Order::findOrFail($order->id);

        $order->delete();

        return redirect()->route('order.index')->with('success', 'Order successfully deleted');
    }
}
