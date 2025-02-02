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
        $addToNewCart=$this->cartServices->addToNewCart($request);
        $addToExistingCart=$this->cartServices->addToExistingCart($request);
        if($addToNewCart)
        {
            return $this->apiResponse($addToNewCart,'Cart Item Added Successfully');
        }

        if($addToExistingCart)
        {
            return $this->apiResponse($addToExistingCart,'Cart Item qunatity plused');
        }
    }

    public function getCartItems()
    {
        $getCartItems=$this->cartServices->getCartItems();
        return $this->apiResponse($getCartItems,'Cart Items Fetched Successfully');
    }

    public function deleteFromCart()
    {
        $deleteFromCart=$this->cartServices->deleteFromCart();
        return $this->apiResponse($deleteFromCart,'Cart Items Deleted Successfully');
    }

    public function clearCart()
    {
        $clearCart=$this->cartServices->clearCart();
        return $this->apiResponse($clearCart,'Cart Items Cleared Successfully');
    }
}
