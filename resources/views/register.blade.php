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
								<h1>Đăng ký</h1>
							</div>
						</div>
						
					</div>
				</div>
			</div>
    
<div class="why-choose-section">
<div class="container bg-light rounded">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="ten" class="form-label">Tên người dùng</label>
            <input type="text" class="form-control" id="ten" name="ten" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="matkhau" class="form-label">Mật Khẩu</label>
            <input type="password" class="form-control" id="matkhau" name="matkhau" required>
        </div>

        <div class="mb-3">
            <label for="diachi" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" id="diachi" name="diachi" required>
        </div>

        <div class="mb-3">
            <label for="sdt" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="sdt" name="sdt" required>
        </div>

        <button type="submit" class="btn btn-primary">Đăng Ký</button>
    </form>
</div>


</div>
	
@endsection