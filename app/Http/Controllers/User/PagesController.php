<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Post;
Use App\Models\Banner;
use App\Models\Category;

class PagesController extends Controller
{
    public function home()
    {
        $featured   = Product::where('status', 'active')->where('is_featured', 1)->orderByDesc('price')->limit(2)->get();
        $posts      = Post::where('status', 'active')->latest()->limit(3)->get();
        $banners    = Banner::where('status', 'active')->latest()->limit(3)->get();
        $products   = Product::where('status', 'active')->latest()->limit(8)->get();
        $category   = Category::where('status', 'active')->where('is_parent', 1)->orderBy('title')->get();

        return view('index', compact('featured', 'posts', 'banners', 'products', 'category'));
    }

    public function aboutUs()
    {
        return view('frontend.pages.about-us');
    }

    public function contactUs()
    {
        return view('frontend.pages.contact');
    }
}
