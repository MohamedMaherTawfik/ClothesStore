<?php

namespace App\Http\Controllers\orders;

use App\http\controllers\auth\apiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\cartRequest;
use App\Services\cartServices;

class cartController extends Controller
{
    use apiResponse;
    private $cartServices;
    public function __construct(cartServices $cartServices)
    {
        $this->cartServices = $cartServices;
    }

    public function addToCart(cartRequest $request)
    {
        $data= $this->cartServices->add_to_cart($request);
        if(!$data){
            return $this->sendError(__('messages.Error_AddToCart'));
        }
        return $this->apiResponse($data,__('messages.AddToCart'));
    }

    public function getCartItems()
    {
        $getCartItems=$this->cartServices->getCartItems();
        if(!$getCartItems){
            return $this->sendError(__('messages.Error_GetCartItems'));
        }
        return $this->apiResponse($getCartItems,__('messages.GetCartItems'));
    }

    public function deleteFromCart()
    {
        $deleteFromCart=$this->cartServices->deleteFromCart(request('products_id'));
        if(!$deleteFromCart){
            return $this->sendError(__('messages.Error_DeleteFromCart'));
        }
        return $this->apiResponse($deleteFromCart,__('messages.DeleteFromCart'));
    }

    public function clearCart()
    {
        $clearCart=$this->cartServices->clearCart();
        return $this->apiResponse($clearCart,__('messages.DeleteAllFromCart'));
    }
}
