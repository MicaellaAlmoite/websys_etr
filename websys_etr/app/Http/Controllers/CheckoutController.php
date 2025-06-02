<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Cashier\Cashier;
use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
public function checkout(Request $request)
{
    $user = $request->user();
    $cartItems = Cart::get();
    $total = $cartItems->sum('price');

    // Create a Stripe Checkout Session
    $checkoutSession = $user->checkout($total, [
        'success_url' => route('checkout.success'),
        'cancel_url' => route('checkout.cancel'),
    ]);

    return redirect($checkoutSession->url);
}

public function success()
{
    // Handle successful payment
    return view('checkout.success');
}

public function cancel()
{
    // Handle canceled payment
    return view('checkout.cancel');
}
public function applyCoupon(Request $request)
{
    $coupon = Coupon::where('code', $request->code)->first();

    if (!$coupon) {
        return redirect()->back()->with('error', 'Invalid coupon code.');
    }

    $request->session()->put('coupon', $coupon);
    return redirect()->back()->with('success', 'Coupon applied!');
}

}
