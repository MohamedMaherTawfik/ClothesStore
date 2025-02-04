<?php

namespace App\Interfaces;

use App\Models\Cart;

interface cartInterface{
    public function getCartItems();
    public function deleteFromCart();
    public function clearCart();
}
