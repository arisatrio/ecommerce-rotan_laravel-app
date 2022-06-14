@extends('layouts.app')

@section('title', "$website->short_des | Tentang")

@section('main-content')

	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="{{ route('about-us') }}">Tentang</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- About Us -->
	<section class="about-us section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="about-content">
							<h3>Selamat Datang di <span>{{ $website->name }}</span></h3>
							<p>{{ $website->description }}</p>
							<div class="button">
								<a href="{{ route('contact-us') }}" class="btn primary">Kontak</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="about-img overlay">
							<img src="{{ $website->photo }}" alt="photo">
						</div>
					</div>
				</div>
			</div>
	</section>
	<!-- End About Us -->
@endsection
