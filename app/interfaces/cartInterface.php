<?php

namespace App\Interfaces;

use App\Models\Cart;

interface cartInterface{
    public function addToCart(cart $cart);
    public function getCartItems();
    public function deleteFromCart();
    public function clearCart();
    public function cartItems(Cart $cart);
}
