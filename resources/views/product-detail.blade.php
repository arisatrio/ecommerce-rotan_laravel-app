@extends('layouts.app')

@section('meta')
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">
	<meta name="description" content="{{ $product->summary }}">
	<meta property="og:url" content="{{ route('product-detail', $product->slug) }}">
	<meta property="og:type" content="article">
	<meta property="og:title" content="{{ $product->name }}">
	<meta property="og:image" content="{{ $product->photo }}">
	<meta property="og:description" content="{{ $product->description }}">
@endsection

@section('title', "$website->short_des | $product->name")

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="">Shop Details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <section class="shop single section">
        <div class="container">
            <div class="row"> 
                <div class="col-12">

                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <!-- Product Slider -->
                            <div class="product-gallery">
                                <!-- Images slider -->
                                <div class="flexslider-thumbnails">
                                    <ul class="slides">
                                        <li data-thumb="{{$product->productPhotosPrimary->photo}}" rel="adjustX:10, adjustY:">
                                            <img src="{{$product->productPhotosPrimary->photo}}" alt="{{$product->productPhotosPrimary->photo}}">
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Images slider -->
                            </div>
                            <!-- End Product slider -->
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="product-des">
                                <!-- Description -->
                                <div class="short">
                                    <h4>{{ $product->name }}</h4>
                                    <p class="price">
                                        @if ($product->getAttributes()['discount'] != NULL)
                                            <span class="discount">{{ $product->discountPrice }}</span>
                                            <s>{{ $product->price }}</s>
                                        @else
                                            <span>{{ $product->price }}</span>
                                        @endif
                                    </p>
                                    <p class="description">{{ $product->summary }}</p>
                                </div>
                                <div class="product-buy">
                                    <div class="add-to-cart mt-4">
                                        <a href="{{ route('add-to-cart', $product->slug) }}" class="btn">Add to cart</a>
                                    </div>
                                    <p class="cat">Category :<a href="#">{{ $product->category->name }}</a></p>
                                    <p class="availability">
                                        Stock : 
                                        @if($product->stock>0) 
                                        <span class="badge badge-success">{{$product->stock}}</span>
                                        @else 
                                        <span class="badge badge-danger">{{$product->stock}}</span>
                                        @endif</p>
                                </div>
                                <!--/ End Product Buy -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection