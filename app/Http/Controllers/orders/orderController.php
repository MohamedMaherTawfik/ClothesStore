<?php

namespace App\Http\Controllers\orders;

use App\http\controllers\auth\apiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\orderRequest;
use App\Services\orderServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    use apiResponse;
    private $orderServices;
    public function __construct(orderServices $orderServices)
    {
        $this->orderServices=$orderServices;
    }

    public function index(){
        $orders=$this->orderServices->allOrders();
        if(!$orders){
            return $this->sendError( 'No orders found.');
        }
        return $this->apiResponse($orders,'Orders Fetched Successfully');
    }

    public function store(orderRequest $request){
        $fields=$request->validated();
        $order=$this->orderServices->createOrder($fields);
        if(!$order){
            return $this->sendError('Order Not Created');
        }
        return $this->apiResponse($order,'Order Created Successfully');
    }

    public function show($id){
        $order=$this->orderServices->showOrder($id);
        if(!$order){
            return $this->sendError('Order Not Found');
        }
        return $this->apiResponse($order,'Order Fetched Successfully');
    }

    public function destroy($id){
        $order=$this->orderServices->destroyOrder($id);
        if(!$order){
            return $this->sendError('Order Not Deleted');
        }
        return $this->apiResponse($order,'Order Deleted Successfully');
    }

    public function getUserOrders(){
        $order=$this->orderServices->getUserOrders(Auth::user()->id);
        if(!$order){
            return $this->sendError('Order Not Found');
        }
        return $this->apiResponse($order,'Order Fetched Successfully');
    }

    public function ChangeStatus($status){
        $order=$this->orderServices->ChangeStatus(request('id'),$status);
        if(!$order){
            return $this->sendError('Order Not Found');
        }
        return $this->apiResponse($order,'Order Status Changed Successfully');
    }
}
