@extends('layouts.app')

@section('title', "$website->short_des | Produk")

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('home') }}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="{{ route('product-index') }}">Produk</a></li>
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
                            <h3 class="title">Kategori</h3>
                            <ul class="categor-list">
                                @foreach ($categories as $category)
                                    @if($category->child->count() > 0)
                                        <li>
                                            <span>{{ $category->name }}</span>
                                            <ul>
                                                @foreach ($category->child as $item)
                                                    <li>{{ $item->name }}</li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li>{{ $category->name }}</li>
                                    @endif
                                @endforeach
                            </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection