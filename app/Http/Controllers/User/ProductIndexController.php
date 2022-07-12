<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProductCategory;
use App\Models\Product;

class ProductIndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $categories         = ProductCategory::with('child')->parent()->active()->get();
        $maxProductPrice    = Product::max('price');
        $latestProduct      = Product::with('productPhotosPrimary')->active()->latest()->take(3)->get();
        $products           = Product::with('productPhotosPrimary')->active()->paginate(3);

        return view('product', compact('categories', 'maxProductPrice', 'latestProduct', 'products'));
    }
}
