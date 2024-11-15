@extends('admin.adlayout')

@section('dashboard')
<div class="container-fluid">
        <div class="row">
        <div class="col-lg-3">
        <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h4 class="card-title text-center">Tổng sản phẩm</h4>
                <h1 class=" mb-2 text-warning text-center  text-uppercase">{{$tongsanpham}}</h1>
               <div class="d-flex justify-content-center">
               <a href="{{route('qlsp')}}" class="card-link text-center">  <button class="btn btn-primary mb-3">Quản lí sản phẩm</button></a>
               </div>
                
              </div>
            </div>
        </div>
        <div class="col-lg-3">
        <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h4 class="card-title text-center">Tổng danh mục</h4>
                <h1 class=" mb-2 text-warning text-center  text-uppercase">{{$tongdanhmuc}}</h1>
               <div class="d-flex justify-content-center">  <a href="{{route('qldm')}}" class="card-link">  <button class="btn btn-primary mb-3">Quản lí danh mục</button></a></div>
              
              </div>
            </div>
        </div>
        <div class="col-lg-3">
        <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h4 class="card-title text-center">Tổng tài khoản</h5>
                <h1 class=" mb-2 text-warning text-center  text-uppercase">{{$tongtaikhoan}}</h1>
                <div class="d-flex justify-content-center"> <a href="{{route('qltk')}}" class="card-link">  <button class="btn btn-primary mb-3">Quản lí tài khoản</button></a></div>
               
              </div>
            </div>
        </div>
        <div class="col-lg-3">
        <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h4 class="card-title text-center">Tổng đơn hàng</h4>
                <h1 class="mb-2 text-warning text-center  text-uppercase">{{$tongdonhang}}</h1>
               <div class="d-flex justify-content-center"><a href="{{route('qldh')}}" class="card-link">  <button class="btn btn-primary mb-3">Quản lí đơn hàng</button></a></div>
                
              </div>
            </div>
        </div>
            <div class="col-lg-8">
            <form action="{{ route('ad.sta') }}" method="POST">
            @csrf
    <div class="row mb-3">
        <!-- Ngày -->
        <div class="col-md-4">
            <label for="date" class="form-label">Ngày</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ request('date') }}">
        </div>

        <!-- Tháng -->
        <div class="col-md-4">
            <label for="month" class="form-label">Tháng</label>
            <select class="form-select" id="month" name="month">
                <option value="">Chọn tháng</option>
                @for($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}" {{ request('month') == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>

        <!-- Năm -->
        <div class="col-md-4">
            <label for="year" class="form-label">Năm</label>
            <select class="form-select" id="year" name="year">
                <option value="">Chọn năm</option>
                @for($i = 2020; $i <= date('Y'); $i++)
                    <option value="{{ $i }}" {{ request('year') == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Lọc</button>
</form>
<div class="mt-4">
    <h4>Thống kê doanh thu</h4>
    <p>Doanh thu: <strong>{{ number_format($sales, 0, ',', '.') }} VND</strong></p>
</div>
            </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body text-center">
              <img src="{{asset('admin/assets/images/profile/user-1.jpg')}} " alt="image" class="img-fluid" width="205">
              <h4 class="mt-7">Tổng tài khoản đã đăng ký:</h4>
              <p class="card-subtitle mt-2 mb-3">Kiểm tra từng tài khoản nhân viên</p>
                <button class="btn btn-primary mb-3">Xem Thêm</button>
            </div>
          </div>
        </div>
     
     
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">AdminMart.com</a>Distributed by <a href="https://themewagon.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
        </div>
      </div>
    </div>
@endsection