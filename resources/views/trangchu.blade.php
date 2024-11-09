@extends('layout')
@section('tittle','Trang chủ')



@section('content')
@section('banner')
<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Chào mừng đến với cửa hàng bán hoa Thiên Lý</h1>
								
								<p class="mb-4">Mong muốn được cung cấp tới khách hàng trải nghiệm sử dụng cũng như các loại hoa mới tốt nhất.</p>
							
								<p><a href="{{route('cuahang')}}" class="btn btn-secondary">Mua sắm Ngay</a><a href="{{route('cuahang')}}" class="btn btn-white-outline">Khám phá thêm</a></p>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<!-- Start Product Section -->
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
		<!-- End Product Section -->

		<!-- Start Why Choose Us Section -->
		<div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<h2 class="section-title">Tại sao nên chọn chúng tôi ?</h2>
						<p>Là lựa chọn hàng đầu của nhiều khách hàng</p>

						<div class="row my-5">
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="img/truck.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Fast &amp; Giao hàng nhanh </h3>
									<p>Giao hàng tận nơi không thu phí.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="img/bag.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Dễ dàng mua sắm</h3>
									<p>Trải nghiệm mua sắm dễ dàng với chỉ một nút bấm</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="img/support.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Hỗ trợ 24/7</h3>
									<p>Liên hệ với chúng tôi ngay để nhận tư vấn và hỗ trợ.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="img/return.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Chính sách hoàn trả</h3>
									<p>Hoàn trả đơn hàng.</p>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="{{ asset('img/img1.jpg') }}" alt="Image" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->

		<!-- Start We Help Section -->
		<div class="we-help-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-7 mb-5 mb-lg-0">
						<div class="imgs-grid">
							<div class="grid grid-1"><img src="img/img1.jpg" alt="Untree.co"></div>
							<div class="grid grid-2"><img src="img/img2.jpg" alt="Untree.co"></div>
							<div class="grid grid-3"><img src="img/img3.jpg" alt="Untree.co"></div>
						</div>
					</div>
					<div class="col-lg-5 ps-lg-5">
						<h2 class="section-title mb-4">Chúng tôi mang đến cho bạn những bông hoa xinh tươi.</h2>
						<p>Tại đây, mỗi bông hoa đều kể một câu chuyện. Hãy đến và khám phá bộ sưu tập hoa phong phú của chúng tôi, được lựa chọn tỉ mỉ từ những trang trại tốt nhất. Chúng tôi cam kết mang đến cho bạn sự hài lòng tuyệt đối với chất lượng sản phẩm và dịch vụ hoàn hảo.</p>

						<ul class="list-unstyled custom-list my-4">
							<li>Hãy để những bông hoa của chúng tôi mang lại niềm vui và sự tươi mới cho cuộc sống</li>
							<li>Hoa không chỉ là món quà mà còn là ngôn ngữ của tình yêu, sự quan tâm và niềm vui.</li>
							<li>Tìm cho mình những bó hoa phù hợp cho mọi dịp lễ, sinh nhật hay chỉ đơn giản là để làm đẹp cho không gian sống của bạn.</li>
							<li>Hãy để những bông hoa của chúng tôi mang lại niềm vui và sự tươi mới cho cuộc sống của bạn. </li>
						</ul>
						<p><a href="{{route('cuahang')}}" class="btn btn-primary">Mua sắm Ngay</a></p>
					</div>
				</div>
			</div>
		</div>
		<!-- End We Help Section -->

		<!-- Start Popular Product -->
		<div class="popular-product">
			<div class="container">
				<div class="row">

					@foreach ($hoa as $h)
					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="img/{{$h->img}}" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>{{$h->tenhoa}}</h3>
								<p>{{$h->gia}} </p>
								<p><a href="{{ route('cuahang.chitiet', ['id_hoa' => $h->id_hoa]) }}">Xem chi tiết</a></p>
							</div>
						</div>
					</div>
					@endforeach

					

				</div>
			</div>
		</div>
		<!-- End Popular Product -->

		<!-- Start Testimonial Slider -->
		<div class="testimonial-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Thành viên</h2>
					</div>
				</div>

				<div class="row justify-content-center">
    					<div class="col-lg-4 text-center">
    					    <div class="testimonial-block">
    					        <div class="author-info">
    					            <div class="author-pic">
    					                <img src="img/TA.jpg" alt="Maria Jones" class="img-fluid">
    					            </div>
    					            <h3 class="font-weight-bold">Hoàng Công Tuấn Anh</h3>
    					            <span class="position d-block mb-3">Backend Intern</span>
    					        </div>
    					    </div>
    					</div>

    					<div class="col-lg-4 text-center">
    					    <div class="testimonial-block">
    					        <div class="author-info">
    					            <div class="author-pic">
    					                <img src="img/person-1.png" alt="Maria Jones" class="img-fluid">
    					            </div>
    					            <h3 class="font-weight-bold">Maria Jones</h3>
    					            <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
    					        </div>
    					    </div>
    					</div>

    					<div class="col-lg-4 text-center">
    					    <div class="testimonial-block">
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
		</div>
		<!-- End Testimonial Slider -->

		<!-- Start Blog Section -->
		<div class="blog-section">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md-6">
						<h2 class="section-title">Bài viết gần </h2>
					</div>
					<div class="col-md-6 text-start text-md-end">
						<a href="#" class="more">Xem tất cả bài viết</a>
					</div>
				</div>

				<div class="row">

					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="img/post-1.jpg" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">First Time Home Owner Ideas</a></h3>
								<div class="meta">
									<span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 19, 2021</a></span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="img/post-2.jpg" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">How To Keep Your Furniture Clean</a></h3>
								<div class="meta">
									<span>by <a href="#">Robert Fox</a></span> <span>on <a href="#">Dec 15, 2021</a></span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="img/post-3.jpg" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">Small Space Furniture Apartment Ideas</a></h3>
								<div class="meta">
									<span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 12, 2021</a></span>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

@endsection
