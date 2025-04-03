<?php

namespace App\Http\Controllers\web\orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\statusrequest;
use App\Models\User;
use App\Services\orderServices;
use App\Services\paymentServices;
use App\Services\productServices;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    private $orderServices;
    private $productServices;
    private $paymentServices;

    public function __construct(orderServices $orderServices, productServices $productServices, paymentServices $paymentServices)
    {
        $this->orderServices = $orderServices;
        $this->productServices = $productServices;
        $this->paymentServices = $paymentServices;
    }

    public function index()
    {
        $orders = $this->orderServices->allOrders();
        foreach ($orders as $order) {
            $user=User::where('id',$order->user_id)->first();
        }
        return view('orders.index', compact('orders'),compact('user'));
    }

    public function findOrder()
    {
        $order = $this->orderServices->showOrder(request('id'));
        $total = [];
        $productName = [];
        foreach ($order as $index => $item) {
            $products = $this->productServices->showProduct($item->products_id);
            $total[$index + 1] = $products->price * $item->quantity;
            $productName[$index + 1] = $products->name;
        }
        return view('orders.show', compact('order','productName','total'));
    }

    public function checkout()
    {
        return view('orders.checkout');
    }

    public function createOrder()
    {
        $this->orderServices->createOrder(request()->all());
        return redirect()->route('home')->with('success', __('messages.store_Message'));
    }

    public function createCheckoutforPayment()
    {
        return view('orders.paymentCheckout');
    }
    public function createOrderWithPayment()
    {
        $order=$this->orderServices->createOrder(request()->all());
        $PaymentKey = $this->paymentServices->pay($order);
        return redirect("https://accept.paymob.com/api/acceptance/iframes/901393?payment_token=" . $PaymentKey);
    }

    public function getUserOrders()
    {
        $orders = $this->orderServices->getUserOrders(Auth::user()->id);
        return view('orders.userOrders', compact('orders'));
    }

    public function deleteOrder()
    {
        $this->orderServices->destroyOrder(request('id'));
        return redirect()->route('orders')->with('success', __('messages.destroy_Message'));
    }

    public function ChangeStatus(statusrequest $request)
    {
        $fields = $request->validated();
        $this->orderServices->ChangeStatus(request('id'), $fields);
        return redirect()->route('orders')->with('success', __('messages.ChangeOrderStatus'));
    }

    public function callback()
    {
        $this->paymentServices->callback(request()->all());
    }

    public function response()
    {
        $this->paymentServices->callback(request()->all());
        $data=request()->all();
        // dd($data);
        if($data['success'] == 'true'){
            return view('orders.success');
        }
        return view('orders.failed');
    }
}
