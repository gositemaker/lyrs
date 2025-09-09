<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use App\Models\Booking;
use App\Models\Course;
class UserController extends Controller
{
    public function index(){
        if(Auth::check() && Auth::user()->user_type =="user"){
            return view('dashboard.index');
        }else if(Auth::check() && Auth::user()->user_type =="admin"){
            return view('admin.dashboard');
        }
    }
    public function profile()
    {
        $user = Auth::user();
        return view('dashboard.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()->route('dashboard.profile')->with('success', 'Profile updated successfully.');
    }

    public function deleteProfile()
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();

        return redirect('/')->with('info', 'Your profile has been deleted.');
    }


    public function orders()
    {
        $orders = Order::where('user_id', Auth::id())->get();
    
        foreach ($orders as $order) {
            if ($order->courses) {
                $courseIds = explode(',', $order->courses); // Convert "1,3" → [1,3]
                $order->course_names = Course::whereIn('id', $courseIds)->pluck('name')->toArray();
            } else {
                $order->course_names = [];
            }
        }
    
        return view('dashboard.orders', compact('orders'));
    }
    public function bookings()
    {
        $bookings = Booking::with('yogaSession')
                    ->where('user_id', Auth::id())
                    ->get();
    
        return view('dashboard.bookings', compact('bookings'));
    }
}
