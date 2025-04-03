<?php

namespace App\Interfaces;

interface paymentInterface{
    public function pay($order);
    public function callback($request);
}
