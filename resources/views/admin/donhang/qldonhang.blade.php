@extends('admin.adlayout')

@section('dashboard')
@if(session('success'))
    <script>
        alert('{{ session('success') }}');
        window.location.href = "{{route('qldh')}}"; 
    </script>
    @endif
<div class="container-fluid">
    <div class="container">
        <h1>Thông tin người dùng</h1>
        <table class="table">
            <thead>
                <tr>
                    
                    <th>Hoa</th>
                    <th>Người dùng</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>
                    <th>Phương thức thanh toán</th> 
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($donhang as $item)
                    @foreach ($item->donhangct as $ct)
                    <tr>
                        <td>{{ $ct->hoa->tenhoa ?? 'N/A' }}</td>
                        <td>{{ $item->nguoidung->ten ?? 'N/A' }}</td>
                        <td>{{ $ct->soluong }}</td>
                        <td>{{ number_format($ct->gia, 0, ',', '.') }} VNĐ</td>
                        <td>{{ $item->ngaydat }}</td>
                        <td>{{ $item->trangthai }}</td>
                        <td>{{ $item->phuongthuctt }}</td>
                        <td>{{ number_format($item->tongtien, 0, ',', '.') }} VNĐ</td>
                        <td>
                            <a href="" class="btn btn-primary mb-2">Chỉnh sửa</a>
                            <form action="{{ route('qldh.delete', $item->id_donhang) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger " onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')">Xóa</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

