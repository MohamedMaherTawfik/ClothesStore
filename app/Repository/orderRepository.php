<?php

namespace App\Repository;

use App\Interfaces\OrderInterface;
use App\Models\order;
use App\Models\orderdetails;
use App\Models\orders;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class orderRepository implements OrderInterface
{

    public function allOrders()
    {
        return orders::all();
    }

    public function showOrder($id)
    {
        return orders::find($id);
    }

    public function destroyOrder($id)
    {
        $orders = orders::find($id);
        $orders->delete();
        return $orders;
    }

    public function getUserOrders($id)
    {
        return User::with('orders')->find($id);
    }
}
