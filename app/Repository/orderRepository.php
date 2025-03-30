<?php

namespace App\Repository;

use App\Interfaces\OrderInterface;
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
        $data = orderdetails::with('product')->where('orders_id', $id)->get();

        $data->each(function ($order) {
            $order->makeHidden(['id', 'updated_at']);

            if ($order->product) {
                $order->product->makeHidden([
                    'id',
                    'image',
                    'description',
                    'brand_id',
                    'created_at',
                    'updated_at'
                ]);
            }
        });
        return $data;
    }

    public function createOrder($data, $total, $total_quantity, $user_address)
    {
        return orders::create([
            'user_id'=>Auth::user()->id,
            'total_price'=>$total,
            'total_quantity'=>$total_quantity,
            'user_address'=>$user_address->address,
            // 'carrier'=>$data['carrier'],
            // 'notes'=>$data['notes'],
            // 'coupon_code'=>$data['coupon_code'],
            // 'discount'=>$data['discount'],
            // 'taxes'=>$data['taxes']
        ]);
    }

    public function createOrderDetails($order, $item)
    {
        return orderdetails::create([
            'orders_id'=>$order->id,
            'products_id'=>$item->product->id,
            'quantity'=>$item->quantity,
            'total_price'=>$item->product->price
        ]);
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

    public function ChangeStatus($id, $status)
    {
        $order = orders::find($id);
        $order->status = $status;
        $order->save();
        return $order;
    }
}
