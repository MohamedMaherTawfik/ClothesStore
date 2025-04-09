<?php

namespace App\Repository;

use App\Interfaces\paymentInterface;
use App\Models\orderdetails;
use App\Models\orders;
use App\Models\userAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentRepository implements paymentInterface
{
    private $apiKey;
    private $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.paymob.api_key');
        $this->baseUrl = 'https://accept.paymob.com/api';
    }


    public function pay($order)
    {
        $total=$order->total_price;
        $id=$order->id;
        $carrier=$order->carrier;
        $address=userAddress::where('user_id',Auth::user()->id)->first();
        // $items=orderdetails::where('orders_id',$id)->get();
        // dd($items->toArray());

        // Step 1: Generate auth token
        $authResponse = Http::post("{$this->baseUrl}/auth/tokens", [
            'api_key' => $this->apiKey,
        ]);
        // dd($authResponse->json());

        $authToken = $authResponse->json('token');
        // dd($authToken);
        // Step 2: Create order
        $orderResponse = Http::post("{$this->baseUrl}/ecommerce/orders", [
            'auth_token' => $authToken,
            'amount_cents' => $total * 100,
            'currency' => 'EGP',
            'merchant_order_id' => $id,
            // 'items' => $items->toArray()
        ]);
        // dd($orderResponse->json());

        $orderId = $orderResponse->json('id');
        // dd($orderId);
        // Step 3: Generate payment key
        $paymentKeyResponse = Http::post("{$this->baseUrl}/acceptance/payment_keys", [
            'auth_token' => $authToken,
            'amount_cents' => $total * 100,
            'expiration' => 3600,
            'order_id' => $orderId,
            'billing_data' => [
                "apartment" => "1",
                "email" => Auth::user()->email,
                "floor" => "1",
                "first_name" => Auth::user()->first_name,
                "street" => $address->address,
                "building" => "6",
                "phone_number" => Auth::user()->phone,
                "shipping_method" => $carrier,
                "postal_code" => $address->postal_code,
                "city" => $address->city,
                "country" => "Egypt",
                "last_name" => Auth::user()->last_name,
                "state" => "Dakahliyah"
            ],
            'currency' => 'EGP',
            'integration_id' => config('services.paymob.integration_id'),
        ]);
        // dd($paymentKeyResponse->json());

        return $paymentKeyResponse->json('token');
    }

    public function callback($requestData)
    {
        Log::info('Paymob Callback Data:', $requestData);

        if (isset($requestData['success']) && $requestData['success'] == 'true') {
            $order = orders::where('id', $requestData['merchant_order_id'])->first();

            if ($order) {
                $order->update([
                'transaction_status' => 'paid',
                'transaction_type'=>'online',
                'transaction_id' => $requestData['id'],
                ]);
                return $order;
            }
        }

        return null;
    }
}
