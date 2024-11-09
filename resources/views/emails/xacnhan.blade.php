<!DOCTYPE html>
<html>
<head>
    <title>Xác nhận đơn hàng</title>
</head>
<body>
    <h1>Cảm ơn bạn đã đặt hàng tại chúng tôi!</h1>
    <p>Chúng tôi đã nhận được đơn hàng của bạn. Dưới đây là thông tin chi tiết đơn hàng:</p>
    
    <h3>Thông tin đơn hàng</h3>
    <p><strong>Tên khách hàng:</strong> {{ $order->ten }}</p>
    <p><strong>Ngày đặt:</strong> {{ $order->ngaydat }}</p>
    <p><strong>Phương thức thanh toán:</strong> Thanh toán khi nhận hàng</p>
    <p><strong>Tổng tiền:</strong> {{ number_format($order->tongtien) }} VNĐ</p>

    <h3>Chi tiết đơn hàng</h3>
    <table border="1">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->details as $detail)
                <tr>
                    <td>{{ $detail->hoa->tenhoa }}</td>
                    <td>{{ $detail->soluong }}</td>
                    <td>{{ number_format($detail->gia) }} VNĐ</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
