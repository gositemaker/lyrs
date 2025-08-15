<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{

    public function add(Request $request)
    {
        $courseId = $request->input('course_id');
        $userId = auth()->id();
    
        if (!$userId) {
            return redirect()->route('login')->with('warning', 'Please login to add items to cart.');
        }
    
        // Optional: Prevent duplicates
        $existing = Cart::where('user_id', $userId)->where('course_id', $courseId)->first();
        if ($existing) {
            return back()->with('info', 'Course already in cart.');
        }
    
        Cart::create([
            'user_id' => $userId,
            'course_id' => $courseId,
        ]);
    
        return back()->with('success', 'Course added to cart!');
    }
    
    public function index()
    {
        $items = Cart::with('course')->where('user_id', auth()->id())->get();
        return view('cart.index', compact('items'));
    }

    public function remove($id)
    {
        Cart::where('id', $id)->where('user_id', auth()->id())->delete();
        return back()->with('success', 'Removed');
    }
    public function view()
{
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    $cartItems = Cart::with('course')
        ->where('user_id', auth()->id())
        ->get();

    return view('cart.view', compact('cartItems'));
}

}
