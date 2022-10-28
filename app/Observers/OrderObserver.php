<?php

namespace App\Observers;

use App\Models\order;
use Illuminate\Support\Arr;
use App\Services\AdminService;
use App\Notifications\PaymentRequest;

class OrderObserver
{
    /**
     * Handle the order "created" event.
     *
     * @param  \App\Models\order  $order
     * @return void
     */
    public function created(order $order)
    {

    }

    /**
     * Handle the order "updating" event.
     *
     * @param  \App\Models\order  $order
     * @return void
     */
    public function updating(order $order)
    {
        $original = $order->getOriginal();

        if ($order->freight_payer_self == 0 &&
            empty($original->bl_release_date) &&
            Arr::has( $order->getDirty(), 'bl_release_date')
        ) {
            AdminService::notify(new PaymentRequest($order));
        }
    }

    /**
     * Handle the order "deleted" event.
     *
     * @param  \App\Models\order  $order
     * @return void
     */
    public function deleted(order $order)
    {
        //
    }

    /**
     * Handle the order "restored" event.
     *
     * @param  \App\Models\order  $order
     * @return void
     */
    public function restored(order $order)
    {
        //
    }

    /**
     * Handle the order "force deleted" event.
     *
     * @param  \App\Models\order  $order
     * @return void
     */
    public function forceDeleted(order $order)
    {
        //
    }
}
