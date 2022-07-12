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

                        <div class="single-widget recent-post">
                            <h3 class="title">Produk Terbaru</h3>
                            @foreach($latestProduct as $product)
                                <!-- Single Post -->
                                <div class="single-post first mb-4">
                                    <div class="image">
                                        <img src="{{ $product->productPhotosPrimary->photo }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h5><a href="{{ route('product-detail', $product->slug) }}">{{$product->name}}</a></h5>
                                        <p class="price">
                                            @if ($product->getAttributes()['discount'] != NULL)
                                                <del class="text-muted">{{ $product->price }}</del>   
                                            @endif
                                            {{ $product->price }}
                                        </p>

                                    </div>
                                </div>
                                <!-- End Single Post -->
                            @endforeach
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
                                        <label>Tampilkan :</label>
                                        <select class="show" name="show" onchange="this.form.submit();">
                                            <option value="">Default</option>
                                            <option value="9" @if(!empty($_GET['show']) && $_GET['show']=='9') selected @endif>09</option>
                                            <option value="15" @if(!empty($_GET['show']) && $_GET['show']=='15') selected @endif>15</option>
                                            <option value="21" @if(!empty($_GET['show']) && $_GET['show']=='21') selected @endif>21</option>
                                            <option value="30" @if(!empty($_GET['show']) && $_GET['show']=='30') selected @endif>30</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Shop Top -->
                        </div>
                    </div>
                    <div class="row">
                        @if(!empty($products))
                            @foreach ($products as $product)
                                <x-product-grid :product="$product" />
                            @endforeach
                        @else
                            <h4 class="text-warning" style="margin:100px auto;">Stok Produk Kosong.</h4>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-12 justify-content-center d-flex">
                            {{ $products->appends($_GET)->links() }}
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
    </section>
@endsection

@push('css-script')
<style>
    .pagination{
        display:inline-flex;
    }
    .filter_button{
        /* height:20px; */
        text-align: center;
        background:#F7941D;
        padding:8px 16px;
        margin-top:10px;
        color: white;
    }
</style>
@endpush