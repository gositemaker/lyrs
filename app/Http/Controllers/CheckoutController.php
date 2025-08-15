<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        $items = Cart::with('course')->where('user_id', auth()->id())->get();
        $total = $items->sum(fn($item) => $item->course->price);

        return view('checkout.index', compact('items', 'total'));
    }

    public function process()
    {
        // Here integrate Razorpay/Stripe
        return redirect()->route('payment.success');
    }

    public function success()
    {
        Cart::where('user_id', auth()->id())->delete();
        return view('checkout.success');
    }
}

