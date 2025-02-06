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

    private $order;

    public function __construct(orders $order)
    {
        $this->order = $order;
    }
    public function allOrders()
    {
        return $this->order->all();
    }

    public function showOrder($id)
    {
        return orderdetails::with('order')->where('orders_id', $id)->get();
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

    public function ChangeStatus($id,$status){
        $order=orders::find($id);
        $order->status=$status;
        $order->save();
        return $order;
    }
}
