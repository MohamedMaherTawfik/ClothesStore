<?php

namespace App\Repository;

use App\Models\Cart;
use App\Interfaces\cartInterface;
use App\Models\CartItems;
use Illuminate\Support\Facades\Auth;

class cartRepository implements cartInterface
{
    public function getCartItems()
    {
        $cart =   Cart::where('user_id', Auth::user()->id)->first();
        return CartItems::with('product')->where('cart_id', $cart->id)->get();
    }

    public function deleteFromCart($id)
    {
        $FindCart = Cart::where('user_id', Auth::user()->id)->first();
        return CartItems::where('cart_id', $FindCart->id)->where('products_id', $id)->delete();
    }

    public function clearCart()
    {
        return Cart::where('user_id', Auth::user()->id)->delete();
    }

}
