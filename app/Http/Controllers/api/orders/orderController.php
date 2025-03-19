<?php

namespace App\Http\Controllers\api\orders;

use App\http\controllers\api\auth\apiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\orderRequest;
use App\Http\Requests\statusrequest;
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
        if(count($orders) == 0){
            return $this->sendError(__('messages.Error_index_Message'));
        }
        return $this->apiResponse($orders,__('messages.index_Message'));
    }

    public function store(orderRequest $request){
        $fields=$request->validated();
        $order=$this->orderServices->createOrder($fields);
        if(!$order){
            return $this->sendError(__("messages.Error_store_Message"));
        }
        return $this->apiResponse($order,__("messages.store_Message"));
    }

    public function show($id){
        $order=$this->orderServices->showOrder($id);
        if(!$order){
            return $this->sendError(__("messages.Error_show_Message"));
        }
        return $this->apiResponse($order,__("messages.show_Message"));
    }

    public function destroy($id){
        $order=$this->orderServices->destroyOrder($id);
        if(!$order){
            return $this->sendError(__("messages.Error_destroy_Message"));
        }
        return $this->apiResponse($order,__("messages.destroy_Message"));
    }

    public function getUserOrders(){
        $order=$this->orderServices->getUserOrders(Auth::user()->id);
        if(!$order){
            return $this->sendError(__("messages.Error_show_Message"));
        }
        return $this->apiResponse($order,__("messages.show_Message"));
    }

    public function ChangeStatus(statusrequest $request){
        $fields=$request->validated();

        $order=$this->orderServices->ChangeStatus(request('id'),$fields['status']);
        if(!$order){
            return $this->sendError(__('messages.Error_ChangeOrderStatus'));
        }
        return $this->apiResponse($order,__('messages.ChangeOrderStatus'));
    }
}
