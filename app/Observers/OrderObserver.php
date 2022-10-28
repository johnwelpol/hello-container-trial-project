<?php

namespace App\Observers;

use App\Models\order;

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
        $order->bl_number = "BL-" . sprintf('%08d', $order->id);
        $order->save();
    }

    /**
     * Handle the order "updated" event.
     *
     * @param  \App\Models\order  $order
     * @return void
     */
    public function updated(order $order)
    {
        //
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
