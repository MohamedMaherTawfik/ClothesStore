<?php

namespace App\Http\Controllers\web\orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\cartRequest;
use App\Models\CartItems;
use App\Models\products;
use App\Services\cartServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    private $cartServices;

    public function __construct(cartServices $cartServices)
    {
        $this->cartServices = $cartServices;
    }
    public function index()
    {
        $cartItems = $this->cartServices->getCartItems();
        $total=0;
        foreach($cartItems as $item){
            $total+=$item->quantity * $item->product->price;
        }
        return view('cart.index', compact('cartItems'),compact('total'));
    }

    public function addToCart(cartRequest $request)
    {
        $fields = $request->validated();
        return $this->cartServices->add_to_cart($fields,request('id'));
    }

    public function clearCart()
    {
        $this->cartServices->clearCart();
        return redirect('/')->with('success', __('messages.DeleteAllFromCart'));
    }

    public function confirmDelete()
    {
        $item=CartItems::where('cart_id', 2)->where('products_id', request('id'))->first();
        $product=products::where('id', $item->products_id)->first();
        return view('cart.delete')->with('product', $product);
    }

    public function deleteFromCart()
    {
        // dd(request('id'));
        $this->cartServices->deleteFromCart(request('id'));
        return redirect('/cart',)->with('success', __('messages.DeleteFromCart'));
    }


}
