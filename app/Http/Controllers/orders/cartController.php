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
        return $this->cartServices->add_to_cart($request);
    }

    public function getCartItems()
    {
        $getCartItems=$this->cartServices->getCartItems();
        return $this->apiResponse($getCartItems,'Cart Items Fetched Successfully');
    }

    public function deleteFromCart()
    {
        $deleteFromCart=$this->cartServices->deleteFromCart(request('products_id'));
        if(!$deleteFromCart){
            return $this->sendError('Cart Items Not Deleted');
        }
        return $this->apiResponse($deleteFromCart,'Cart Items Deleted Successfully');
    }

    public function clearCart()
    {
        $clearCart=$this->cartServices->clearCart();
        return $this->apiResponse($clearCart,'Cart Items Cleared Successfully');
    }
}
