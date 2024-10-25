@extends('layout')
@section('tittle','Giới thiệu')

@section('content')


		

		<!-- Start Why Choose Us Section -->
	
	
	<div class="why-choose-section">
		<div class="container bg-light rounded">
 				 <div class="row justify-content-between align-items-start">
 				   <div class="col-lg-6">
 				    	 <img class="card-img-top custom-img rounded" src="{{ asset('img/' .$hoa->img) }}" alt="Card image cap">
 				   </div>
 				   <div class="col-lg-6 d-flex flex-column">
 				    		 <h1 class="card-title mt-3" style="text-transform: uppercase;">{{$hoa->tenhoa }}</h1>
 				    		 <p class="card-text">Giá: {{$hoa->gia }} VNĐ</p>
 				    		 <p class="card-text">Mô tả: {{$hoa->mota }}</p>

 				     <div class="mt-auto ms-auto"> 
 				       		<a href="" class="btn btn-secondary mt-3">Thêm vào giỏ hàng</a>
 				     	</div>
    				</div>
  				</div>
		</div>

</div>
	

	


		<!-- End Why Choose Us Section -->

		<!-- Start Team Section -->
			
		<div class="product-section">
			<div class="container">
			<div class="row">
			<div class="row mb-5">
					<div class="col-lg-5 mx-auto text-center">
						<h2 class="section-title">Sản phẩm liên quan</h2>
					</div>
				</div>
				@foreach($hoalq as $h)
						 <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="product-item" href="{{ route('cuahang.chitiet', ['id_hoa' => $h->id_hoa]) }}">
							<img src="{{asset('img/'.$h->img)}}" class="img-fluid product-thumbnail">
							<h3 class="product-title">{{$h->tenhoa}}</h3>
							<strong class="product-price">{{$h->gia}}</strong>

							<span class="icon-cross">
								<img src="{{asset('img/cross.svg')}}" class="img-fluid">
							</span>
						</a>
					</div> 
					
					@endforeach
					
				
					

				</div>
			</div>
		</div>

		

	

@endsection
