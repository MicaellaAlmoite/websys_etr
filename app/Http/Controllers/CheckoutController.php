<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class CheckoutController extends Controller
{/**
     * @middleware('auth:web')
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * @middleware('auth:web')
     */
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return Redirect::route('cart.index')->with('error', 'Your cart is empty.');
        }

        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $discount = 0;
        $couponCode = $request->input('coupon');

        if ($couponCode) {
            $coupon = Coupon::where('code', $couponCode)->first();
            if ($coupon) {
                $discount = $subtotal * ($coupon->discount / 100);
            } else {
                $request->session()->flash('error', 'Invalid coupon code.');
            }
        }

        $total = $subtotal - $discount;
        return view('checkout.index', compact('cart', 'subtotal', 'discount', 'total', 'couponCode'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return Redirect::route('cart.index')->with('error', 'Your cart is empty.');
        }

        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $discount = 0;
        $couponCode = $request->input('coupon');

        if ($couponCode) {
            $coupon = Coupon::where('code', $couponCode)->first();
            if ($coupon) {
                $discount = $subtotal * ($coupon->discount / 100);
            }
        }

        $total = $subtotal - $discount;

        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'items' => $cart,
            'status' => 'Pending',
        ]);

        session()->forget('cart');
        return Redirect::route('orders.show', $order)->with('success', 'Order placed successfully!');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }
}
