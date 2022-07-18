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
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <!-- Shop Top -->
                            <div class="shop-top">
                                <div class="shop-shorter">
                                    <div class="single-shorter">
                                        <label>Profile :</label>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Shop Top -->
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
    </section>
@endsection