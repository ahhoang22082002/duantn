@extends('layout')
@section('tittle','Cửa hàng')

@section('content')

<!-- Start Hero Section -->
@section('banner')
<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Sản phẩm của chúng tôi</h1>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
			<div class="row">
			@foreach ($hoa as $item)
<div class="col-12 col-md-4 col-lg-3 mb-5">
    <a class="product-item" href="{{ route('cuahang.chitiet', ['id_hoa' => $item->id_hoa]) }}">
        <img src="img/{{$item->img }}" class="img-fluid product-thumbnail">
        <h3 class="product-title">{{ $item->tenhoa }}</h3>
        <strong class="product-price">{{ $item->gia }}</strong>
        <span class="icon-cross">
            <img src="img/cross.svg" class="img-fluid">
        </span>
    </a>
</div>
@endforeach
</div>

		    </div>
		</div>
@endsection
