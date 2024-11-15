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
        <h1 class="text-primary text-uppercase">Danh sách đơn hàng</h1>
        <form action="{{ route('qldh.search') }}" method="GET">
    <div class="row mb-3">
        <div class="col-md-3">
            <input type="text" name="query" class="form-control" placeholder="Tìm kiếm đơn hàng" value="{{ request('query') }}">
        </div>
        <div class="col-md-3">
            <select name="status" class="form-control">
                <option value="">Tất cả trạng thái</option>
                <option value="Đã đặt hàng" {{ request('status') == 'Đã đặt hàng' ? 'selected' : '' }}>Đã đặt hàng</option>
                <option value="Đã nhận đơn hàng" {{ request('status') == 'Đã nhận đơn hàng' ? 'selected' : '' }}>Đã nhận đơn hàng</option>
                <option value="Đang giao" {{ request('status') == 'Đang giao' ? 'selected' : '' }}>Đang giao</option>
                <option value="Đã nhận" {{ request('status') == 'Đã nhận' ? 'selected' : '' }}>Đã nhận</option>
            </select>
        </div>
        <div class="col-md-3">
            <select name="payst" class="form-control">
                <option value="">Trạng thái thanh toán</option>
                <option value="1" {{ request('payst') == 1 ? 'selected' : '' }}>Chưa thanh toán</option>
                <option value="2" {{ request('payst') == 2 ? 'selected' : '' }}>Đã thanh toán</option>
                
            </select>
        </div>
        <div class="col-md-3">
            <select name="sort" class="form-control">
                <option value="moi" {{ request('sort') == 'moi' ? 'selected' : '' }}>Mới nhất</option>
                <option value="cu" {{ request('sort') == 'cu' ? 'selected' : '' }}>Cũ nhất</option>
             
            </select>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary mt-2">Tìm kiếm</button>
        </div>
    </div>
</form>
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
                    <th>Trạng thái thanh toán</th>
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
                        <td>{{ $item->thanhtoan->trangthaitt }}</td>
                        <td>{{ number_format($item->tongtien, 0, ',', '.') }} VNĐ</td>
                        <td>
                            <a href="{{route('qldh.edit',$item->id_donhang)}}" class="btn btn-primary mb-2">Sửa</a>
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
        <div class="d-flex justify-content-center">
            {{ $donhang->links('pagination::bootstrap-5') }}
                </div>
    </div>
</div>

@endsection

