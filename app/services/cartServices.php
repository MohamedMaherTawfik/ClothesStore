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

    public function add_to_cart($request,$products_id)
    {
        $cart=Cart::where('user_id', Auth::user()->id)->first();
        if(!$cart){
            $cart=$this->cartRepository->createCart();
            $this->cartRepository->newCartItems($request['quantity'],$products_id);
            return redirect()->back()->with('Product Added Success',__('messages.Quantityplused'));
        }
        else{
            if(isset(CartItems::where('cart_id', $cart->id)->where('products_id', $products_id)->first()->id)){
                $this->cartRepository->quantityPlus($cart,$products_id,$request['quantity']);
                return redirect()->back()->with('Qantity Added Success',__('messages.Quantityplused'));
            }
            else{
                $this->cartRepository->ExistCartItems($cart,$products_id,$request['quantity']);
                return redirect()->back()->with('Product Added Success',__('messages.Quantityplused'));
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
