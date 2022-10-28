<?php
namespace App\Services;

use App\Models\User;
use App\Models\Order;
use App\Notifications\PaymentRequest;

class CheckOrderService 
{
    /**
     * Check all the order that are for payment and notify them.
     *
     * @return void
     */
    public static function notifyForPaymentRequest()
    {
        $admin = AdminService::getAdminDetails();
        Order::query()
            ->with(['user'])
            ->where('freight_payer_self', 0)
            ->where('bl_release_date', null)
            ->chunk(100, function ($orders) use ($admin)  {
                $orders->each(function ($order, $key) use ($admin) {
                    $admin->notify(new PaymentRequest($order)); 
                    // After the notification update the bl_release_date.
                    $order->bl_release_date = now();
                    $order->save();
                });
            });
    }
}
