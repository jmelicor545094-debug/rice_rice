<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('order.rice')->orderByDesc('created_at')->get();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $orders = Order::with('rice')->get();
        return view('payments.create', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|numeric|min:0',
        ]);

        Payment::create([
            'order_id' => $request->order_id,
            'amount' => $request->amount,
            'status' => $request->input('status', 'Unpaid'),
        ]);

        return redirect()->route('payments.index')->with('success', 'Payment recorded successfully.');
    }

    public function updateStatus($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = 'Paid';
        $payment->save();

        return back()->with('success', 'Payment status updated to Paid.');
    }
}