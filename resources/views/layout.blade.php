
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

		<link href="{{ asset('/css/tiny-slider.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
		<title>@yield('title')</title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<img src="{{asset('img/logo.png')}}" style="max-width:70px;max-height:70px" alt="">

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li>
							<a class="nav-link" href="{{route('trangchu')}}">Trang chủ</a>
						</li>
						<li><a class="nav-link" href="{{route('cuahang')}}">Cửa hàng</a></li>
						<li><a class="nav-link" href="{{route('gioithieu')}}">Giới thiệu</a></li>
					
						<li><a class="nav-link" href="{{route('baiviet')}}">Bài viết</a></li>
						<li><a class="nav-link" href="{{route('lienhe')}}">Liên hệ</a></li>
					</ul>
					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
							<li class="nav-item">
        						<a class="nav-link" href="{{ route('cart') }}">
            						<img src="{{ asset('/img/cart.svg') }}" alt="Giỏ hàng">
        						</a>
   							 </li>
   							 @if (Auth::check())
   							     <li class="nav-item">
   							         <a class="nav-link text-dark" href="{{route('taikhoan')}}">
   							             {{ Auth::user()->ten }} 
   							         </a>
   							     </li>
   							     <li class="nav-item">
   							         <form action="{{ route('logout') }}" method="POST" class="d-inline">
   							             @csrf
   							             <button type="submit" class="nav-link text-dark text-uppercase" style="border: none; background: none; cursor: pointer;">Đăng xuất</button>
   							         </form>
   							     </li>
   							 @else
   							     <li class="nav-item">
   							         <a class="nav-link" href="{{ route('login') }}">
   							             <img src="{{ asset('/img/user.svg') }}" alt="Đăng nhập">
   							         </a>
   							     </li>
   							 @endif

  
					</ul>


				</div>
			</div>
				
		</nav>
	@yield('banner')
		@yield('content')
		<footer class="footer-section">
			<div class="container relative">



				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="{{asset('/img/envelope-outline.svg')}}" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Enter your name">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Enter your email">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
					<img src="{{asset('img/logo.png')}}" style="max-width:70px;max-height:70px" alt="">
						<p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">About us</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Support</a></li>
									<li><a href="#">Knowledge base</a></li>
									<li><a href="#">Live chat</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Our team</a></li>
									<li><a href="#">Leadership</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Nordic Chair</a></li>
									<li><a href="#">Kruzo Aero</a></li>
									<li><a href="#">Ergonomic Chair</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a hreff="https://themewagon.com">ThemeWagon</a>  <!-- License information: https://untree.co/license/ -->
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	


		<script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('/js/tiny-slider.js')}}"></script>
		<script src="{{asset('/js/custom.js')}}"></script>
		<script src = "{{asset('/js/detail.js')}}"></script>
	
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

	</body>

</html>