@extends('layout')
@section('tittle','Tài khoản')

@section('content')
<div class="container bg-light rounded mb-3 mt-3 ">
        <div class="row  ">
            <div class="col-md-4">
            <!-- <img src="img/TA.jpg" alt="Image" class="img-fluid w-50"> -->
                    <h1>{{ Auth::user()->ten }}</h1>
                    <ul class="list-group list-group-flush">
                     <a href="{{route('taikhoan')}}" style="text-decoration:none"><li class="list-group-item">Thông tin cá nhân</li></a> 
                      <a href="{{route('taikhoan.donhang')}}" style="text-decoration:none"><li class="list-group-item">Đơn hàng</li></a>

                    </ul>
            </div>
            <div class="col-md-8">
            <h2 class="h3 mb-3 text-black">Danh sách đơn hàng</h2>
            <table class="table">
                    <thead>
                        <tr>
                            <th>Tên hoa</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Ngày đặt</th>
                            <th>Trạng thái</th>
                            <th>Phương thức thanh toán</th>
                            <th>Trạng thái thanh toán</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donhang as $item)
                            @foreach ($item->donhangct as $ct)
                                <tr>
                                    <td>{{ $ct->hoa->tenhoa ?? 'N/A' }}</td>
                                    <td>{{ $ct->soluong }}</td>
                                    <td>{{ number_format($ct->gia, 0, ',', '.') }} VNĐ</td>
                                    <td>{{ $item->ngaydat }}</td>
                                    <td>{{ $item->trangthai }}</td>
                                    <td>{{ $item->phuongthuctt }}</td>
                                    <td>{{ $item->thanhtoan->trangthaitt }}</td>
                                    <td>{{ number_format($item->tongtien, 0, ',', '.') }} VNĐ</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
            </table>
         
             </div>
         </div>
     </div>

@endsection