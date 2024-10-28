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
								<h1>Đăng nhập</h1>
							</div>
						</div>
						
					</div>
				</div>
			</div>
    
            <div class="why-choose-section">
    <div class="container bg-light rounded">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mật Khẩu</label>
                <input type="password" class="form-control" id="matkhau" name="matkhau" required>
            </div>

            <button type="submit" class="btn btn-primary">Đăng Nhập</button>
            
            <div class="mt-3">
                <p>Bạn chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></p>
            </div>
        </form>
    </div>
</div>

	
@endsection