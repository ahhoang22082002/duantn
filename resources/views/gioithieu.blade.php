@extends('layout')
@section('tittle','Giới thiệu')

@section('content')


		
@section('banner')
<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Giới thiệu</h1>
								
								
								
							</div>
						</div>
						
					</div>
				</div>
			</div>
		<!-- Start Why Choose Us Section -->
		<div class="product-section">
			<div class="container">
				<div class="row">

					<!-- Start Column 1 -->
					<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
						<h2 class="mb-4 section-title">Sản phẩm mới.</h2>
						<p class="mb-4">Khám phá những sản phẩm mới nhất của chúng tôi. </p>
						<p><a href="{{route('cuahang')}}" class="btn btn-primary">Mua sắm ngay</a></p>
					</div> 
					
					
					@foreach($hoa as $h)
						 <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="product-item" href="{{ route('cuahang.chitiet', ['id_hoa' => $h->id_hoa]) }}">
							<img src=" img/{{$h->img}}" class="img-fluid product-thumbnail">
							<h3 class="product-title">{{$h->tenhoa}}</h3>
							<strong class="product-price">{{$h->gia}}</strong>

							<span class="icon-cross">
								<img src="img/cross.svg" class="img-fluid">
							</span>
						</a>
					</div> 
					
					@endforeach
					
					<!-- Start Column 2 -->
					
					<!-- End Column 2 -->

				
				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->

		<!-- Start Team Section -->
		<div class="untree_co-section">
			<div class="container">

				<div class="row mb-5">
					<div class="col-lg-5 mx-auto text-center">
						<h2 class="section-title">Our Team</h2>
					</div>
				</div>

				<div class="row">

					<!-- Start Column 1 -->
					<div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
						<img src="img/person_1.jpg" class="img-fluid mb-5">
						<h3 clas><a href="#"><span class="">Lawson</span> Arnold</a></h3>
            <span class="d-block position mb-4">CEO, Founder, Atty.</span>
            <p>Separated they live in.
            Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>
					</div> 
					<!-- End Column 1 -->

					<!-- Start Column 2 -->
					<div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
						<img src="img/person_2.jpg" class="img-fluid mb-5">

						<h3 clas><a href="#"><span class="">Jeremy</span> Walker</a></h3>
            <span class="d-block position mb-4">CEO, Founder, Atty.</span>
            <p>Separated they live in.
            Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>

					</div> 
					<!-- End Column 2 -->

					<!-- Start Column 3 -->
					<div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
						<img src="img/person_3.jpg" class="img-fluid mb-5">
						<h3 clas><a href="#"><span class="">Patrik</span> White</a></h3>
            <span class="d-block position mb-4">CEO, Founder, Atty.</span>
            <p>Separated they live in.
            Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>
					</div> 
					<!-- End Column 3 -->

					<!-- Start Column 4 -->
					<div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
						<img src="img/person_4.jpg" class="img-fluid mb-5">

						<h3 clas><a href="#"><span class="">Kathryn</span> Ryan</a></h3>
            <span class="d-block position mb-4">CEO, Founder, Atty.</span>
            <p>Separated they live in.
            Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>

          
					</div> 
					<!-- End Column 4 -->

					

				</div>
			</div>
		</div>
		<!-- End Team Section -->

		

		<!-- Start Testimonial Slider -->
		<div class="testimonial-section before-footer-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Testimonials</h2>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="testimonial-slider-wrap text-center">

							<div id="testimonial-nav">
								<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
								<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
							</div>

							<div class="testimonial-slider">
								
								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="img/person-1.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria Jones</h3>
													<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="img/person-1.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria Jones</h3>
													<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="img/person-1.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria Jones</h3>
													<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Testimonial Slider -->

@endsection
