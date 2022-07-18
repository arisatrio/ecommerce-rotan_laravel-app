@extends('layouts.app')

@section('title', "$website->short_des | Akun")

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('home') }}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="{{ route('product-index') }}">Akun</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="product-area shop-sidebar shop section">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-4 col-12">
                    <div class="shop-sidebar">

                        <div class="single-widget category">
                            <h3 class="title">Akun</h3>
                            <ul class="categor-list">
                                <li>
                                    <a href="">
                                        Pesanan
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        Profile
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <!--/ End col -->
                @auth
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row mb-4">
                        <div class="col-12">
                            <!-- Shop Top -->
                            <div class="shop-top">
                                <div class="shop-shorter">
                                    <div class="single-shorter">
                                        <label>Pesanan :</label>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Shop Top -->
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table shopping-summery">
                                        <thead>
                                            <tr class="main-hading">
                                                <th>PRODUCT</th>
                                                <th>NAME</th>
                                                <th class="text-center">PRICE</th>
                                                <th class="text-center">QUANTITY</th>
                                                <th class="text-center">TOTAL</th>
                                                <th class="text-center">STATUS</th>
                                            </tr>
                                        </thead>
                                        <tbody id="cart_item_list">
                                            @foreach ($order as $item)
                                                <tr>
                                                    <td class="image">
                                                        <img src="{{ $item->product->productPhotosPrimary->photo }}" alt="">
                                                    </td>
                                                    <td class="product-des">
                                                        <p class="product-name"><b>{{ $item->product->name }}</b></p>
                                                        <p class="product-des">{{ $item->product->summary }}</p>
                                                    </td>
                                                    <td class="price" data-title="Price"><span>{{ $item->price }}</span></td>
                                                    <td class="qty">{{ $item->quantity }}</td>
                                                    <td class="total-amount cart_single_price">
                                                        <span class="money">{{ $item->amount }}</span>
                                                    </td>
                                                    <td>
                                                        {{ $item->order->status }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
            @endauth
        </div>
    </section>
@endsection