<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Post;
Use App\Models\Banner;
use App\Models\ProductCategory;

class PagesController extends Controller
{
    public function home()
    {
        $featured   = Product::where('status', 'active')->where('is_featured', 1)->orderByDesc('price')->limit(2)->get();
        $banners    = Banner::where('status', 'active')->latest()->limit(3)->get();
        $products   = Product::with('productPhotosPrimary')->active()->latest()->limit(8)->get();
        $category   = ProductCategory::where('status', 'active')->where('is_parent', 1)->orderBy('name')->get();

        return view('index', compact('featured', 'banners', 'products', 'category'));
    }

    public function aboutUs()
    {
        return view('about-us');
    }

    public function contactUs()
    {
        return view('contact');
    }
}
