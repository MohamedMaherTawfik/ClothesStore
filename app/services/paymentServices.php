<?php

namespace App\Services;

use App\Interfaces\paymentInterface;

class paymentServices
{
    private $paymentRepository;

    public function __construct(paymentInterface $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function pay($order)
    {
        $order = $this->paymentRepository->pay($order);
        return $order;
    }

    public function callback($requestData)
    {
        $order = $this->paymentRepository->callback($requestData);
        if($order){
            return $order;
        }
        return null;
    }
}
