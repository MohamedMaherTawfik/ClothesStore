<?php

namespace App\Repository;

use App\Models\Cart;
use App\Interfaces\cartInterface;
use App\Models\CartItems;
use Illuminate\Support\Facades\Auth;

class cartRepository implements cartInterface
{
    public function addToCart($cart)
    {
        Cart::create([
            'user_id' => Auth::user()->id,
            'quantity' => $cart->quantity
        ]);
        CartItems::create([
            'cart_id' => Cart::latest()->first()->id,
            'product_id' => $cart->products_id
        ]);
    }

    public function cartItems(cart $cart)
    {
        CartItems::create([
            'cart_id' => $cart->id,
            'products_id' => $cart->products_id
        ]);
    }

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
