<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
{
    $orders = auth()->user()->orders;
    return view('orders.index', compact('orders'));
}

public function show(Order $order)
{
    $this->authorize('view', $order);
    return view('orders.show', compact('order'));
}
}
