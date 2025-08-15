<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Redirect;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
class RazorpayPaymentController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);
        $total = collect($cart)->sum(function ($item) {
            return $item['price'];
        });

        return view('checkout', compact('cart', 'total'));
    }

    public function payment(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($request->razorpay_payment_id);

        if ($payment->status == 'authorized') {
            //
            $paymentId = $request->input('razorpay_payment_id');

            // Get cart data from DB
            $cartItems = Cart::where('user_id', Auth::id())->get();
        
            if ($cartItems->isEmpty()) {
                return redirect()->route('courses.index')->with('error', 'Cart is already empty or not found.');
            }
        
            $totalAmount = $cartItems->sum('course.price');
        
            // Save Order
            Order::create([
                'user_id' => Auth::id(),
                'payment_id' => $paymentId,
                'payment_method' => 'razorpay',
                'amount' => $totalAmount,
                'courses' => $cartItems->pluck('course_id')->implode(','), // Or use json_encode([...])
                'status' => 'completed'
            ]);
        
            // Clear cart
            Cart::where('user_id', Auth::id())->delete();
        
            return redirect()->route('courses.index')->with('success', 'Payment successful! Order saved.');
        

        //     //
        //     $payment->capture(['amount' => $payment->amount]);
        //    // session()->forget('cart');
        //     Cart::where('user_id', Auth::id())->delete();

        //     return redirect()->route('courses.index')->with('success', 'Payment successful! Cart cleared.');
        //    // return redirect()->route('home')->with('success', 'Payment Successful!');
        } else {
            return back()->withErrors('Payment failed.');
        }
        
    }
}
