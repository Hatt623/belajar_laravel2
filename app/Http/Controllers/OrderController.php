<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() 
    {
        $orders = Order::with('products')->where('user_id', auth()->id())->latest()->get();
        
        return view('orders', compact('orders'));
    }

    public function show($id)
    {
        $orders = Order::with('products')->where('user_id', auth()->id())->findOrfail();

        return view('order_detail', compact('order'));
    }
}
