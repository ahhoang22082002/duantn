<!DOCTYPE html>
<html>
<head>
    <title>Xác nhận đơn hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            color: #5cb85c;
            text-align: center;
        }

        h3 {
            color: #333;
            margin-top: 20px;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            margin: 10px 0;
        }

        .order-info, .order-detail {
            margin-bottom: 20px;
        }

        .order-info p, .order-detail p {
            font-size: 14px;
            color: #555;
        }

        .order-info strong, .order-detail strong {
            font-weight: bold;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #f8f8f8;
            color: #333;
        }

        td {
            background-color: #fafafa;
        }

        .total-price {
            font-size: 18px;
            font-weight: bold;
            color: #e74c3c;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            color: #888;
            margin-top: 40px;
        }

        .footer a {
            color: #3498db;
            text-decoration: none;
        }

        .btn {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
            text-align: center;
        }

        .btn:hover {
            background-color: #2980b9;
        }
        </style>
</head>
<body>
    <h1>Cảm ơn bạn đã đặt hàng tại chúng tôi!</h1>
    <p>Chúng tôi đã nhận được đơn hàng của bạn. Dưới đây là thông tin chi tiết đơn hàng:</p>
    
    <h3>Thông tin đơn hàng</h3>
    <p><strong>Tên khách hàng:</strong> {{ $order->ten }}</p>
    <p><strong>Ngày đặt:</strong> {{ $order->ngaydat->format('d/m/Y H:i') }}</p> 
    <p><strong>Phương thức thanh toán:</strong> {{ $order->phuongthuctt }}</p>
    <p><strong>Tổng tiền:</strong> {{ number_format($order->tongtien, 0, ',', '.') }} VNĐ</p>

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
            @foreach ($order->donhangct as $detail) 
                <tr>
                    <td>{{ $detail->hoa->tenhoa }}</td> 
                    <td>{{ $detail->soluong }}</td>
                    <td>{{ number_format($detail->gia, 0, ',', '.') }} VNĐ</td>
                </tr>
            @endforeach
            <tr>
            <td colspan="2" style="text-align: center; font-weight: bold;">Tổng tiền:</td>
            <td>{{ number_format($order->tongtien, 0, ',', '.') }}  VNĐ</td>
        </tr>
        </tbody>
    </table>
    <h1>Hàng của bạn sẽ được giao tận nơi!</h1>
</body>
</html>
