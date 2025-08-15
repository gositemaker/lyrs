<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
class HomeController extends Controller
{
    //
    public function index()
    {
        // You can pass data to the view if needed
        $testimonials = Testimonial::latest()->get();
        return view('home', compact('testimonials'));
    }
}
