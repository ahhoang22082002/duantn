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

		<!-- Start Team Section -->
		<div class="untree_co-section">
			<div class="container">

			<div class="testimonial-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Thành viên</h2>
					</div>
				</div>

				<div class="row justify-content-center">
    					<div class="col-lg-3 text-center">
    					    <div class="testimonial-block">
    					        <div class="author-info">
    					            <div class="author-pic">
    					                <img src="img/TA.jpg" alt="Maria Jones" class="img-fluid">
    					            </div>
    					            <h3 class="font-weight-bold">Hoàng Công Tuấn Anh</h3>
    					            <span class="position d-block mb-3">PS25741</span>
    					        </div>
    					    </div>
    					</div>

    					<div class="col-lg-3 text-center">
    					    <div class="testimonial-block">
    					        <div class="author-info">
    					            <div class="author-pic">
    					                <img src="img/TS.jpg" alt="Maria Jones" class="img-fluid">
    					            </div>
    					            <h3 class="font-weight-bold">Khẩu Thành Sang</h3>
    					            <span class="position d-block mb-3">PS25741</span>
    					        </div>
    					    </div>
    					</div>

    					<div class="col-lg-3 text-center">
    					    <div class="testimonial-block">
    					        <div class="author-info">
    					            <div class="author-pic">
    					                <img src="img/TT.jpg" alt="Maria Jones" class="img-fluid">
    					            </div>
    					            <h3 class="font-weight-bold">Nguyễn Thanh Tuấn</h3>
    					            <span class="position d-block mb-3">PS25741</span>
    					        </div>
    					    </div>
    					</div>
						<div class="col-lg-3 text-center">
    					    <div class="testimonial-block">
    					        <div class="author-info">
    					            <div class="author-pic">
    					                <img src="img/VA.jpg" alt="Maria Jones" class="img-fluid">
    					            </div>
    					            <h3 class="font-weight-bold">Nguyễn Vũ Anh</h3>
    					            <span class="position d-block mb-3">PS25741.</span>
    					        </div>
    					    </div>
    					</div>
				</div>

			</div>
		</div>
			</div>
		</div>
		<!-- End Team Section -->

		

	
@endsection
