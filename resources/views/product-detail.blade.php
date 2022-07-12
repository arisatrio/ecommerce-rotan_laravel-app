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
                                        {{-- @php 
                                            $photo=explode(',',$product_detail->photo);
                                        @endphp --}}
                                        {{-- @foreach($photo as $data) --}}
                                            <li data-thumb="{{$product->productPhotosPrimary->photo}}" rel="adjustX:10, adjustY:">
                                                <img src="{{$product->productPhotosPrimary->photo}}" alt="{{$product->productPhotosPrimary->photo}}">
                                            </li>
                                        {{-- @endforeach --}}
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
                                    <div class="rating-main">
                                        <ul class="rating">
                                            {{-- @php
                                                $rate=ceil($product->getReview->avg('rate'))
                                            @endphp
                                                @for($i=1; $i<=5; $i++)
                                                    @if($rate>=$i)
                                                        <li><i class="fa fa-star"></i></li>
                                                    @else 
                                                        <li><i class="fa fa-star-o"></i></li>
                                                    @endif
                                                @endfor --}}
                                        </ul>
                                        {{-- <a href="#" class="total-review">({{ $product['getReview']->count()}}) Review</a> --}}
                                    </div>
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
                                    <form action="{{route('single-add-to-cart')}}" method="POST">
                                        @csrf 
                                        <div class="quantity">
                                            <h6>Quantity :</h6>
                                            <!-- Input Order -->
                                            <div class="input-group">
                                                <div class="button minus">
                                                    <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                        <i class="ti-minus"></i>
                                                    </button>
                                                </div>
                                                <input type="hidden" name="slug" value="{{$product->slug}}">
                                                <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1" id="quantity">
                                                <div class="button plus">
                                                    <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                                        <i class="ti-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        <!--/ End Input Order -->
                                        </div>
                                        <div class="add-to-cart mt-4">
                                            <button type="submit" class="btn">Add to cart</button>
                                            <a href="{{route('add-to-wishlist',$product->slug)}}" class="btn min"><i class="ti-heart"></i></a>
                                        </div>
                                    </form>

                                    {{-- <p class="cat">Category :<a href="{{route('product-cat',$product->cat_info['slug'])}}">{{$product->cat_info['title']}}</a></p> --}}
                                    {{-- @if($product->sub_cat_info)
                                    <p class="cat mt-1">Sub Category :<a href="{{route('product-sub-cat',[$product->cat_info['slug'],$product->sub_cat_info['slug']])}}">{{$product->sub_cat_info['title']}}</a></p>
                                    @endif --}}
                                    <p class="availability">Stock : @if($product->stock>0)<span class="badge badge-success">{{$product->stock}}</span>@else <span class="badge badge-danger">{{$product->stock}}</span>  @endif</p>
                                </div>
                                <!--/ End Product Buy -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection