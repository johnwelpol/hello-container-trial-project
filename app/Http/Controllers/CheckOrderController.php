<?php

namespace App\Http\Controllers;

use App\Services\CheckOrderService;
use Illuminate\Http\Request;

class CheckOrderController extends Controller
{
    
    /**
     * Notify admin for all orders that are for payment request.
     *
     * @return void
     */
    public function notifyForPaymentRequest()
    {
        CheckOrderService::notifyForPaymentRequest();

        return 'Please wait for the Order notification.';
    }
}
