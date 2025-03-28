<?php

namespace App\Services;

use App\Http\Controllers\api\admin\apiResponse;
use App\Http\Requests\cartRequest;
use App\Interfaces\cartInterface;
use App\Models\Cart;
use App\Models\CartItems;
use App\Models\products;
use Illuminate\Support\Facades\Auth;

class cartServices {
    private $cartRepository;
    use apiResponse;

    public function __construct(cartInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function add_to_cart(cartRequest $request)
    {
        $fields=$request->validated();
        $cart=Cart::where('user_id', Auth::user()->id)->first();
        if(!$cart){
            Cart::create([
                'user_id'=>Auth::user()->id,
            ]);
            CartItems::create([
                'cart_id'=>Cart::where('user_id', Auth::user()->id)->first()->id,
                'products_id'=>$request['products_id'],
                'quantity'=>$request['quantity'],
            ]);
            return $this->apiResponse([],__('messages.AddToCart'));
        }
        else{
            if(isset(CartItems::where('cart_id', $cart->id)->where('products_id', $request['products_id'])->first()->id)){
                CartItems::where('cart_id', $cart->id)->where('products_id', $request['products_id'])->increment('quantity', $fields['quantity']);
                return $this->apiResponse([],__('messages.Quantityplused'));
            }
            else{
                CartItems::create([
                    'cart_id'=>$cart->id,
                    'products_id'=>$request['products_id'],
                    'quantity'=>$fields['quantity'],
                ]);
                return $this->apiResponse([],__('messages.Quantityplused'));
            }
        }
    }

    public function deleteFromCart($id)
    {
        $data=$this->cartRepository->deleteFromCart($id);
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
