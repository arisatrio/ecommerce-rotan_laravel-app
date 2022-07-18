@extends('layouts.app')
@section('title','Cart')
@section('main-content')
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="{{('home')}}">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUCT</th>
								<th>NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th>
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody id="cart_item_list">
							@foreach ($cart as $item)
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
									<td class="action" data-title="Remove"><a href="{{ route('cart.destroy', $item->id) }}"><i class="ti-trash remove-icon"></i></a></td>
								</tr>
							@endforeach
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
			{{-- <div class="row">
				<div class="col-12">
					<hr>
					<table class="table shopping-c">
						<thead>
							<tr class="main-hading">
								<th>Nama Layanan</th>
								<th>Tipe Pengiriman</th>
								<th class="text-center">Biaya</th>
								<td></td>
							</tr>
						</thead>
						<tbody>
							@foreach ($kurir as $item)
							<tr>
								<td>{{ $item->destination }}</td>
								<td>{{ $item->type }}</td>
								<td>{{ $item->price }}</td>
								<td></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div> --}}
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								{{-- <div class="input-group">
									<label for="">Pilih Pengiriman</label>
									<select name="" id="">
										@foreach ($kurir as $item)
										<option value="">{{ $item->destination }}</option>									
										@endforeach
									</select>
								</div> --}}
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<div class="button5">
										@if ($cart->count() !== 0)
										<a href="{{route('checkout')}}" class="btn">Proses Order</a>
										<a href="{{ route('product-index') }}" class="btn">Kembali ke Product</a>											
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->

@endsection
@push('styles')
	<style>
		li.shipping{
			display: inline-flex;
			width: 100%;
			font-size: 14px;
		}
		li.shipping .input-group-icon {
			width: 100%;
			margin-left: 10px;
		}
		.input-group-icon .icon {
			position: absolute;
			left: 20px;
			top: 0;
			line-height: 40px;
			z-index: 3;
		}
		.form-select {
			height: 30px;
			width: 100%;
		}
		.form-select .nice-select {
			border: none;
			border-radius: 0px;
			height: 40px;
			background: #f6f6f6 !important;
			padding-left: 45px;
			padding-right: 40px;
			width: 100%;
		}
		.list li{
			margin-bottom:0 !important;
		}
		.list li:hover{
			background:#F7941D !important;
			color:white !important;
		}
		.form-select .nice-select::after {
			top: 14px;
		}
	</style>
@endpush
@push('scripts')
	<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
	<script>
		$(document).ready(function() { $("select.select2").select2(); });
  		$('select.nice-select').niceSelect();
	</script>

@endpush
