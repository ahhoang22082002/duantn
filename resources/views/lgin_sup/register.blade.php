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
            @error('ten')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="mb-3">
            <label for="matkhau" class="form-label">Mật Khẩu</label>
            <input type="password" class="form-control" id="matkhau" name="matkhau" required>
            @error('matkhau')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="mb-3">
            <label for="diachi" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" id="diachi" name="diachi" required>
            @error('diachi')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="mb-3">
            <label for="sdt" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="sdt" name="sdt" required>
            @error('sdt')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <button type="submit" class="btn btn-primary">Đăng Ký</button>
    </form>
</div>


</div>
	
@endsection