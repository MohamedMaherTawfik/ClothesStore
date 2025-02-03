<?php

namespace App\Services;

use App\Interfaces\OrderInterface;
use App\Models\Cart;
use App\Models\order;
use App\Models\orders;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class orderServices
{
    private $orderRepository;

    public function __construct(OrderInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    public function allOrders()
    {
        $allOrders=$this->orderRepository->allOrders();
        return $allOrders;
    }

    public function createOrder($data){

        $order_items=Cart::with('products')->where('user_id', Auth::user()->id)->get();
        foreach($order_items as $item){
            foreach($item->products as $product){
                $price=$product->price*$item->qunatity;
                $total=$price+$total;
                $total_quantity+=$item->qunatity;
            }
        }
        $order=orders::create([
            'user_id'=>Auth::user()->id,
            'total_price'=>$total,
            'total_quantity'=>$total_quantity,
            'status'=>'pending',
            'notes'=>$data['notes'],
        ]);

        foreach($order_items as $item){
            foreach($item->products as $product){
                $order->orderDetails()->create([
                    'orders_id'=>$order->id,
                    'products_id'=>$item->products_id,
                    'qunatity'=>$item->qunatity,
                ]);
            }
        }
        return $order->orderDetails()->get();
    }

    Public function showOrder($id){
        $order=$this->orderRepository->showOrder($id);
        return $order;
    }

    public function destroyOrder($id){
        $order=$this->orderRepository->destroyOrder($id);
        return $order;
    }

    public function getUserOrders($id){
        $order=$this->orderRepository->getUserOrders($id);
        return $order;
    }
}
