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
 					               <h1 class="card-title mt-3" style="text-transform: uppercase;">{{ $hoa->tenhoa }}</h1>
 					               <p class="card-text">Giá: {{ number_format($hoa->gia, 0, ',', '.') }} VNĐ</p>
 					               <p class="card-text">Mô tả: {{ $hoa->mota }}</p>

 					               <form action="{{ route('cart.add') }}" method="POST" class="mt-3">
 					                   @csrf
 					                   <input type="hidden" name="id" value="{{ $hoa->id_hoa }}">
									    <input type="hidden" name="img" value="{{$hoa->img}}">
 					                   <input type="hidden" name="name" value="{{ $hoa->tenhoa }}">
 					                   <input type="hidden" name="price" value="{{ $hoa->gia }}">

										<div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 200px;">
   												 <div class="input-group-prepend">
   												     <button class="btn btn-secondary decrease" type="button" onclick="changeQuantity(event, {{ $hoa->id_hoa }}, -1)">−</button>
   												 </div>
   												 <input type="number" class="form-control text-center quantity-amount" name="quantity" value="1" min="1" aria-label="Quantity" data-id="{{ $hoa->id_hoa }}">
   												 <div class="input-group-append">
   												     <button class="btn btn-secondary  increase" type="button" onclick="changeQuantity(event, {{ $hoa->id_hoa }}, 1)">+</button>
   												 </div>
										</div>



 					                   <div class="mt-auto ms-auto"> 
 					                       <button type="submit" class="btn btn-secondary mt-3">Thêm vào giỏ hàng</button>
 					                   </div>
 					               </form>
 					           </div>
 					       </div>
 					   </div>
			</div>





   


	


	
			
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
