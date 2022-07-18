<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

class CartProcessController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $order = Order::create([
        //     'user_id'       => auth()->user()->id,
        //     'order_number'  => 'ORD-'.strtoupper(Str::random(10)),
        //     ''
        // ])
        dd(auth()->user()->cart()->get());
    }
}
