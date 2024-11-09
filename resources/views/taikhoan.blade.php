@extends('layout')
@section('tittle','Tài khoản')

@section('content')
@if(session('success'))
    <script>
        alert('{{ session('success') }}');
        window.location.href = "{{ route('taikhoan') }}"; 
    </script>
@endif
    <div class="container bg-light rounded mb-3 mt-3 ">
        <div class="row  ">
            <div class="col-md-4">
            <img src="img/img1.jpg" alt="Image" class="img-fluid w-50">
                    <h1>{{ Auth::user()->ten }}</h1>
                    <ul class="list-group list-group-flush">
                     <a href="{{route('taikhoan')}}" style="text-decoration:none"><li class="list-group-item">Thông tin cá nhân</li></a> 
                      <a href="" style="text-decoration:none"><li class="list-group-item">Đơn hàng</li></a>
                      <a href="" style="text-decoration:none"><li class="list-group-item">Lịch sử thanh toán</li></a>
                    </ul>
            </div>
            <div class="col-md-8">
            <h2 class="h3 mb-3 text-black">Thông tin khách hàng</h2>

            <div class="p-3 p-lg-5 border bg-white">
            <form method="POST" action="{{ route('capnhattaikhoan') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-6">
                    <label for="c_address" class="text-black">Tên người dùng</label>
                    <input type="text" class="form-control" id="ten" name="ten"  value="{{ Auth::user()->ten }}"  >
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                    <label for="c_address" class="text-black">Địa chỉ</label>
                    <input type="text" class="form-control" id="diachi" name="diachi" value="{{ Auth::user()->diachi }}"  >
                    </div>
                </div>

                <div class="form-group row ">
                    <div class="col-md-6">
                    <label for="c_address" class="text-black">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required >
                    </div>
                    <div class="col-md-6">
                    <label for="c_address" class="text-black">Số điện thoại</label>
                    <input type="text" class="form-control" id="sdt" name="sdt" value="{{ Auth::user()->sdt }}" required >
                    </div>
                </div>
                <div class="form-group row mb-5">
                        <div class="col-md-6">
                            <label for="matkhau" class="text-black">Mật khẩu mới</label>
                            <input type="password" class="form-control" id="matkhau" name="matkhau" placeholder="Nhập mật khẩu mới">
                        </div>
                        <div class="col-md-6">
                            <label for="matkhau_confirmation" class="text-black">Xác nhận mật khẩu mới</label>
                            <input type="password" class="form-control" id="matkhau_confirmation" name="matkhau_confirmation" placeholder="Xác nhận mật khẩu mới">
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
             </div>
         </div>
     </div>
@endsection