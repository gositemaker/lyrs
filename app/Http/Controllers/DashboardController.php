<?php



namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $user->update($request->only('name', 'phone'));

        return redirect()->route('dashboard.profile')->with('success', 'Profile updated successfully.');
    }

    public function password()
    {
        return view('user.password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password does not match.');
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('dashboard.password')->with('success', 'Password updated successfully.');
    }

    public function orders()
    {
        $orders = Auth::user()->orders ?? []; // assuming relation `orders`
        return view('user.orders', compact('orders'));
    }

    public function bookings()
    {
        $bookings = Auth::user()->bookings ?? []; // assuming relation `bookings`
        return view('user.bookings', compact('bookings'));
    }
}
