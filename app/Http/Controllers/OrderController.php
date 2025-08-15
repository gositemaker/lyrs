<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class OrderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::latest()->with('user')->get();
        return view('admin.orders.index', compact('orders'));
    }
}
