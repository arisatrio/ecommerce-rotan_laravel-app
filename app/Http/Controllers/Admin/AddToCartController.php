<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Cart;

class AddToCartController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (empty($request->slug)) {
            request()->session()->flash('error','Produk tidak ditemukan');
            return back();
        }  

        $product = Product::active()->where('slug', $request->slug)->first();
        if (empty($product)) {
            request()->session()->flash('error','Produk tidak ditemukan');
            return back();
        }

        //if already
        $already_cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first();
        if($already_cart) {
            $already_cart->update([
                'quantity'  => $already_cart->quantity + 1,
                'amount'    => $already_cart->amount + $product->getAttributes()['price'],
            ]);
            if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) {
                return back()->with('error','Stok Produk Habis!.');
            }
            request()->session()->flash('success','Produk berhasil ditambahkan ke Keranjang');
            return back();
        } else {
            $cart = Cart::create([
                'user_id'   => auth()->user()->id,
                'product_id'    => $product->id,
                'price'         => $product->getAttributes()['price'],
                'quantity'      => 1,
                'amount'        => (int)str_replace(',', '', substr($product->discountPrice, strpos($product->discountPrice, "Rp. ") + 4)),
            ]);
            request()->session()->flash('success','Produk berhasil ditambahkan ke Keranjang');
            return back();
        }
    }
}
