<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

  public function index()
  {
    $orders = Order::query()->where('user_id', auth()->user()->id);
    $ordStatus = Order::where('user_id', auth()->user()->id)->get();
    if (request('status')) {
      $orders->where('status', request('status'));
    }
    $orders = $orders->get();
    return view('orders.index', compact('orders', 'ordStatus'));
  }

  public function show(Order $order)
  {
    $this->authorize('author', $order);
    $items = json_decode($order->content);
    return view('orders.show', compact('order', 'items'));
  }
}
