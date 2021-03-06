<div class="product-area most-popular section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Terbaru</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel popular-slider">
                    @foreach($products as $product)
                            <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{ route('product-detail', $product->slug)}}">
                                    <img class="default-img" src="{{ $product->productPhotosPrimary->photo }}" alt="">
                                    <img class="hover-img" src="{{ $product->productPhotosPrimary->photo }}" alt="">
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#{{$product->id}}" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                        <a title="Wishlist" href="#" ><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                    </div>
                                    <div class="product-action-2">
                                        <a href="{{route('add-to-cart',$product->slug)}}">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{ route('product-detail', $product->slug)}}" class="text-uppercase">{{ $product->name }}</a></h3>
                                <div class="product-price">
                                    @if ($product->getAttributes()['discount'] != NULL)
                                        <span class="old">{{ $product->price }}</span>
                                        <span class="badge badge-danger">{{ $product->discount }}</span>
                                        <br>
                                    @endif
                                    <span>{{ $product->discountPrice }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>