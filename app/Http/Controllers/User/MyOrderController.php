<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cart;

class MyOrderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $order = Cart::with(['product', 'product.productPhotosPrimary', 'order'])->where('user_id', auth()->user()->id)->whereNotNull('order_id')->get();

        return view('_user.pesanan', compact('order'));
    }
}
