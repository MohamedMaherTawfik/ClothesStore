<?php

namespace App\Services;

use App\Http\Requests\cartRequest;
use App\Interfaces\cartInterface;
use App\Models\Cart;
use App\Models\CartItems;
use App\Models\products;
use Illuminate\Support\Facades\Auth;

class cartServices {
    private $cartRepository;

    public function __construct(cartInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function     addToNewCart(cartRequest $request)
    {
        $findProduct=products::findOrFail($request->products_id);
        if(!$findProduct){
            return false;
        }
        $cart=Cart::where('user_id', Auth::user()->id)->first();
        if(!$cart)
        {
            $fields=$request->validated();
            $data=$this->cartRepository->addToCart($fields);
            return $data;
        }
    }

    public function addToExistingCart(cartRequest $request)
    {
        $findProduct=products::findOrFail($request->products_id);
        if(!$findProduct){
            return false;
        }
        $cart=Cart::where('user_id', Auth::user()->id)->first();
        if($cart)
        {
            if(isset(CartItems::where('cart_id', $cart->id)->where('products_id', $cart->products_id)->first()->id))
            {
                $cart->qunatity++;
                $data=$cart->save();
                return $data->products();
            }
            else
            {
                $data=$this->cartRepository->cartItems($cart);
                return $data->products();
            }
        }
    }

    public function deleteFromCart()
    {
        $data=$this->cartRepository->deleteFromCart();
        return $data;
    }

    public function clearCart()
    {
        $data=$this->cartRepository->clearCart();
        return $data;
    }

    public function getCartItems()
    {
        $data=$this->cartRepository->getCartItems();
        return $data;
    }


}
