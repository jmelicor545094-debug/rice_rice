<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Rice;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('rice')->orderByDesc('created_at')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $rices = Rice::all();
        return view('orders.create', compact('rices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rice_id' => 'required|exists:rices,id',
            'quantity' => 'required|numeric|min:0.1',
        ]);

        $rice = Rice::findOrFail($request->rice_id);
        $total = $request->quantity * $rice->price;

        Order::create([
            'rice_id' => $rice->id,
            'quantity' => $request->quantity,
            'total' => $total,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }
}