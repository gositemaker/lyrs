<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function process(Request $request)
    {
        // Basic validation
        $request->validate([
            'payment_method' => 'required|string',
        ]);

        // Handle payment method (stripe/razorpay etc.)
        $method = $request->payment_method;

        if ($method === 'razorpay') {
            // Redirect or render Razorpay view
            return redirect()->route('razorpay.checkout');
        }

        if ($method === 'stripe') {
            // Redirect or render Stripe view
            return redirect()->route('stripe.checkout');
        }

        return back()->withErrors('Invalid payment method selected.');
    }

}
