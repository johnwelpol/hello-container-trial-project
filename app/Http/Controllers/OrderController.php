<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\CheckOrderService;
use App\Http\Requests\Order\UpdateRequest;

class OrderController extends Controller
{

    /**
     * Update Order.
     *
     * @param Order $order
     * @param Request $request
     * @return Order
     */
    public function update(Order $order, UpdateRequest $request) 
    {
        return tap($order)->update(
            $request->validated()
        );
    }

    /**
     * Paginated List
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        return Order::paginate($request->get('limit'));
    }
}
