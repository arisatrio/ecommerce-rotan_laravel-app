<div class="col-lg-4 col-md-6 col-12">
    <div class="single-product">
        <div class="product-img">
            <a href="{{route('product-detail', $product->slug)}}">
                <img class="default-img" src="{{ $product->productPhotosPrimary->photo }}" alt="">
                <img class="hover-img" src="{{ $product->productPhotosPrimary->photo }}" alt="">
                @if ($product->getAttributes()['discount'] != NULL)
                    <span class="price-dec">{{ $product->discount }} % Off</span>
                @endif
            </a>
            <div class="button-head">
                <div class="product-action-2">
                    <a title="Add to cart" href="{{ route('add-to-cart', $product->slug) }}">Add to cart</a>
                </div>
            </div>
        </div>

        <div class="product-content">
            <h3><a href="{{ route('product-detail', $product->slug) }}">{{ $product->name }}</a></h3>
            @if ($product->getAttributes()['discount'] != NULL)
                <span>{{ $product->discountPrice }}</span>
                <del style="padding-left:4%;">{{ $product->price }}</del>
            @else
                <span>{{ $product->price }}</span>
            @endif
        </div>
    </div>
</div>      