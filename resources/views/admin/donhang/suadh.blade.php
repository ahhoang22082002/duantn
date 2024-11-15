@extends('admin.adlayout')

@section('dashboard')
<div class="container-fluid">
<h1 class="text-primary text-uppercase">Sửa đơn hàng</h1>
    <div class="row">
        <div class="col-md-6">
        <form action="{{ route('qldh.update', $donhang->id_donhang) }}" method="POST">
        @csrf
        <h3>Sửa trạng thái đơn hàng:</h3>
            <div>
                <input type="radio" id="status_ordered" name="trangthai" value="Đã đặt hàng" {{ $donhang->trangthai == 'Đã đặt hàng' ? 'checked' : '' }}>
                <label for="status_ordered">Đã đặt hàng</label>
            </div>
            <div>
                <input type="radio" id="status_preparing" name="trangthai" value="Đã nhận đơn hàng" {{ $donhang->trangthai == 'Đã nhận đơn hàng' ? 'checked' : '' }}>
                <label for="status_preparing">Đã nhận đơn</label>
            </div>
            <div>
                <input type="radio" id="status_shipping" name="trangthai" value="Đang giao" {{ $donhang->trangthai == 'Đang giao' ? 'checked' : '' }}>
                <label for="status_shipping">Đang giao</label>
            </div>
            <div>
                <input type="radio" id="status_received" name="trangthai" value="Đã nhận" {{ $donhang->trangthai == 'Đã nhận' ? 'checked' : '' }}>
                <label for="status_received">Đã nhận hàng</label>
            </div>
        </div>
        <div class="col-md-6">
        <h3>Sửa trạng thái thanh toán:</h3>
            <div>
                <input type="radio" id="status_unpaid" name="id_tt" value="1" {{ $donhang->id_tt == 1 ? 'checked' : '' }}>
                <label for="status_unpaid">Chưa thanh toán</label>
            </div>
            <div>
                <input type="radio" id="status_paid" name="id_tt" value="2" {{ $donhang->id_tt == 2 ? 'checked' : '' }}>
                <label for="status_paid">Đã thanh toán</label>
            </div>
            <button type="submit" class="btn btn-success mt-2">Cập nhật</button>
        </div>
        
        </form>
    </div>
</div>
@endsection
