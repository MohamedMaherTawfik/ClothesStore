<?php

namespace App\Interfaces;

use App\Models\Cart;

interface cartInterface{
    public function getCartItems();
    public function deleteFromCart($id);
    public function clearCart();
    public function createCart();
    public function quantityPlus($cart,$products_id,$fields);
    public function newCartItems($request,$products_id);
    public function ExistCartItems($cart,$products_id,$fields);
}
