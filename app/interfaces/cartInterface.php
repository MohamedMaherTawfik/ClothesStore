<?php

namespace App\Interfaces;

use App\Models\Cart;

interface cartInterface{
    public function getCartItems();
    public function deleteFromCart($id);
    public function clearCart();
}
