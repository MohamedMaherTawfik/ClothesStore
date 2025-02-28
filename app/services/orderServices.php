<?php

namespace App\Services;

use App\Interfaces\cartInterface;
use App\Interfaces\OrderInterface;
use App\Models\Cart;
use App\Models\CartItems;
use App\Models\order;
use App\Models\orderdetails;
use App\Models\orders;
use App\Models\User;
use App\Models\userAddress;
use Illuminate\Support\Facades\Auth;

class orderServices
{
    private $orderRepository;
    private $cartRepository;

    public function __construct(OrderInterface $orderRepository,cartInterface $cartRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->cartRepository=$cartRepository;
    }
    public function allOrders()
    {
        $allOrders=$this->orderRepository->allOrders();
        return $allOrders;
    }

    public function createOrder($data){
        $total=0;
        $total_quantity=0;
        $cartItem=$this->cartRepository->getCartItems();
        // return $cartItem;
        foreach($cartItem as $item){
            $total+=$item->quantity * $item->product->price;
            $total_quantity+=$item->quantity;
        }
        $user_address=userAddress::where('user_id',Auth::user()->id)->first();
        // dd($user_address);
        $order=orders::create([
            'user_id'=>Auth::user()->id,
            'total_price'=>$total,
            'total_quantity'=>$total_quantity,
            'user_address'=>$user_address->address,
            'carrier'=>$data['carrier'],
            'notes'=>$data['notes'],
            'coupon_code'=>$data['coupon_code'],
            'discount'=>$data['discount'],
            'taxes'=>$data['taxes']
        ]);


        foreach($cartItem as $item){
                orderdetails::create([
                    'orders_id'=>$order->id,
                    'products_id'=>$item->product->id,
                    'quantity'=>$item->quantity,
                    'price'=>$item->product->price
                ]);
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

    public function ChangeStatus($id,$status){
        $order=$this->orderRepository->ChangeStatus($id,$status);
        return $order;
    }
}
