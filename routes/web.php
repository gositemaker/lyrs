<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminYogaSessionController;
use App\Http\Controllers\UserYogaSessionController;
use App\Http\Controllers\AdminYogaCategoryController;
use App\Http\Controllers\AdminTimeSlotController;
use App\Http\Controllers\YogaBookingController;
use App\Http\Controllers\HomeController;
// Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process')->middleware('auth');
// Route::get('/payment/razorpay', [PaymentController::class, 'razorpayCheckout'])->name('razorpay.checkout');
// Route::get('/payment/stripe', [PaymentController::class, 'stripeCheckout'])->name('stripe.checkout');
Route::get('/checkout', [RazorpayPaymentController::class, 'checkout'])->name('razorpay.checkout')->middleware('auth');
Route::post('/razorpay/payment', [RazorpayPaymentController::class, 'payment'])->name('razorpay.payment')->middleware('auth');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard',[UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
//Route::get('admin/courses', [CourseController::class, 'index'])->name('admin.courses.index');

Route::prefix('admin')->group(function () {
    Route::get('courses', [CourseController::class, 'index'])->name('admin.courses.index');
    Route::post('courses', [CourseController::class, 'store']);
    Route::put('courses/{course}', [CourseController::class, 'update']);
    Route::delete('courses/{course}', [CourseController::class, 'destroy']);
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');

    Route::get('yoga-sessions', [AdminYogaSessionController::class, 'index'])->name('admin.yoga_sessions.index');
    Route::get('yoga-sessions/create', [AdminYogaSessionController::class, 'create'])->name('admin.yoga_sessions.create');
    Route::post('yoga-sessions', [AdminYogaSessionController::class, 'store'])->name('admin.yoga_sessions.store');
    Route::get('yoga-sessions/{id}/edit', [AdminYogaSessionController::class, 'edit'])->name('admin.yoga_sessions.edit');
    Route::put('yoga-sessions/{id}', [AdminYogaSessionController::class, 'update'])->name('admin.yoga_sessions.update');
    Route::delete('yoga-sessions/{id}', [AdminYogaSessionController::class, 'destroy'])->name('admin.yoga_sessions.destroy');
    Route::resource('yoga_categories', AdminYogaCategoryController::class)->names('admin.yoga_categories');
   // Route::resource('yoga-sessions', AdminYogaSessionController::class);
   Route::get('yoga-sessions/{id}', [AdminYogaSessionController::class, 'show'])->name('admin.yoga_sessions.show');

    Route::get('yoga-sessions/{session}/slots', [AdminTimeSlotController::class, 'index'])->name('admin.time_slots.index');
    Route::get('yoga-sessions/{session}/slots/create', [AdminTimeSlotController::class, 'create'])->name('admin.time_slots.create');
    Route::post('yoga-sessions/{session}/slots', [AdminTimeSlotController::class, 'store'])->name('admin.time_slots.store');
    Route::delete('yoga-sessions/{session}/slots/{slot}', [AdminTimeSlotController::class, 'destroy'])->name('admin.time_slots.destroy');
 
});
Route::get('/courses', [CourseController::class, 'userIndex'])->name('courses.index');
Route::get('/courses/{trainer}', [CourseController::class, 'trainerCourses'])->name('courses.trainer');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'view'])->name('cart.view');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');


});
// Admin Routes


// User Routes
Route::get('/yoga-sessions', [UserYogaSessionController::class, 'index'])->name('yoga_sessions.index');
Route::get('/yoga-sessions/{id}', [UserYogaSessionController::class, 'show'])->name('yoga_sessions.show');
Route::post('/yoga-sessions/{id}/book', [UserYogaSessionController::class, 'book'])->middleware('auth')->name('yoga_sessions.book');
Route::get('/my-bookings', [UserYogaSessionController::class, 'myBookings'])->middleware('auth')->name('yoga_sessions.myBookings');
Route::get('/book-session', [YogaBookingController::class, 'index'])->name('book.session');
Route::get('/book-session/{trainer}', [YogaBookingController::class, 'trainerSessions'])->name('yoga_sessions.by_trainer');


require __DIR__.'/auth.php';
