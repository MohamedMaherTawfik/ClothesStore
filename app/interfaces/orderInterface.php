<?php

namespace   App\Interfaces;

use Illuminate\Support\Facades\Auth;

interface OrderInterface{
    public function allOrders();
    public function showOrder(int $id);
    public function destroyOrder(int $id);
    public function getUserOrders(int $id);
    public function changeStatus(int $id,int $status);
}
