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
        return Cart::with('products')->where('user_id', Auth::user()->id)->first();
    }

    public function deleteFromCart()
    {
        $FindCart = Cart::where('user_id', Auth::user()->id)->first();
        return CartItems::where('cart_id', $FindCart->id)->where('products_id', request('products_id'))->delete();
    }

    public function clearCart()
    {
        return Cart::where('user_id', Auth::user()->id)->delete();
    }

}
