<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;

class OrderPolicy
{
  public function author(User $user, Order $order)
  {
    if ($order->user_id == $user->id) {
      return true;
    } else {
      return false;
    }
  }

  public function payment(User $user, Order $order)
  {
    if ($order->status == Order::PENDIENTE) {
      return true;
    } else {
      return false;
    }
  }
}
