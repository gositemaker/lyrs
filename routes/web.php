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
use App\Http\Controllers\SessionCatalogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminAvailabilityController as AdminAvailability;


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

    Route::get('/availability', [AdminAvailability::class, 'index'])->name('admin.availability.index');
    Route::post('/availability', [AdminAvailability::class, 'store'])->name('admin.availability.store');
    Route::put('/availability/{id}', [AdminAvailability::class, 'update'])->name('admin.availability.update');
    Route::delete('/availability/{id}', [AdminAvailability::class, 'destroy'])->name('admin.availability.destroy');
   // Route::delete('/availability/{availability}', [AdminAvailability::class, 'destroy'])->name('admin.availability.destroy');
   Route::get('/availability/calendar', [AdminAvailability::class,'calendar'])->name('admin.availability.calendar');
   Route::get('/availability/view', [AdminAvailability::class,'view'])->name('admin.availability.view');


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
    Route::post('/sessions/{session}/book', [BookingController::class, 'store'])->name('sessions.book');
    Route::get('/booking/{booking}/success', [BookingController::class, 'success'])->name('booking.success');


});
// Admin Routes


// User Routes
// Route::get('/yoga-sessions', [UserYogaSessionController::class, 'index'])->name('yoga_sessions.index');
// Route::get('/yoga-sessions/{id}', [UserYogaSessionController::class, 'show'])->name('yoga_sessions.show');
// Route::post('/yoga-sessions/{id}/book', [UserYogaSessionController::class, 'book'])->middleware('auth')->name('yoga_sessions.book');
// Route::get('/my-bookings', [UserYogaSessionController::class, 'myBookings'])->middleware('auth')->name('yoga_sessions.myBookings');
Route::get('/book-session', [SessionCatalogController::class, 'index'])->name('book.session');
Route::get('/book-session/{trainer}', [SessionCatalogController::class, 'trainerSessions'])->name('yoga_sessions.by_trainer');
Route::get('/sessions/{session}', [SessionCatalogController::class, 'show'])->name('yoga_sessions.show');
Route::get('/sessions/{session}/slots', [BookingController::class, 'slots'])->name('sessions.slots');

require __DIR__.'/auth.php';
