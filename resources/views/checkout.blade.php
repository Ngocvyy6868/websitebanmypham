<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Định dạng chung */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h2 {
    font-size: 30px;
    color: #333;
    text-align: center;
    margin-bottom: 30px;
}

h3 {
    font-size: 22px;
    color: #007bff;
    margin-bottom: 15px;
}

p {
    font-size: 16px;
    color: #555;
}

/* Giỏ hàng */
.cart-items {
    margin-bottom: 30px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.table th, .table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table th {
    background-color: #007bff;
    color: white;
}

.cart-summary {
    margin-top: 20px;
    font-size: 18px;
    font-weight: bold;
}

/* Form thông tin */
.checkout-info {
    margin-top: 40px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    font-size: 16px;
    font-weight: bold;
    color: #333;
}

.form-group input,
.form-group textarea,
.form-group select {
    width: 100%;
    padding: 12px;
    margin-top: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
    color: #333;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #007bff;
}

/* Nút xác nhận */
.btn-primary {
    background-color: #007bff;
    color: white;
    padding: 12px 30px;
    font-size: 18px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

/* Hiển thị thông báo lỗi */
.errors {
    color: #d9534f;
    font-weight: bold;
    margin-bottom: 20px;
}
.back-btn {
    padding: 10px 20px;
    background-color: #28a745;
    color: white;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    border: none;
    /* Di chuyển nút qua phải một chút */
    margin-left: 20px; /* Tăng giá trị để di chuyển nút sang phải */
    float: right; /* Đưa nút sang phía bên phải */
}


    .back-btn:hover {
        background-color: #218838;
    }


    </style>
</head>
<body>
<div class="container">
<button class="back-btn" onclick="window.location.href='{{ url()->previous() }}';">Trở về</button>
    <h2>Trang Thanh Toán</h2>

    @if(session('fullname'))
    <p><strong>Chào {{ session('fullname') }}</strong></p>
    @else
    <p>Vui lòng <a href="{{ url('/dang-nhap') }}">đăng nhập</a> để tiếp tục thanh toán.</p>
    @endif

    <!-- Hiển thị giỏ hàng -->
    @if(session('cart') && count(session('cart')) > 0)
    <form action="{{ url('/gio-hang') }}" method="POST">
        @csrf

        <div class="cart-items">
            <h3>Giỏ hàng</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach(session('cart') as $id => $details)
                    @php
                    $price = $details['price'];
                    $quantity = $details['quantity'];
                    $total += $price * $quantity;
                    @endphp
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>{{ number_format($price, 0, ',', '.') }} VNĐ</td>
                        <td>{{ $quantity }}</td>
                        <td>{{ number_format($price * $quantity, 0, ',', '.') }},000  VNĐ</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="cart-summary">
                <p><strong>Tổng cộng: {{ number_format($total, 0, ',', '.') }} ,000 VNĐ</strong></p>
            </div>
        </div>

        <!-- Thông tin người nhận và phương thức thanh toán -->
        <div class="checkout-info">
            <h3>Thông tin giao hàng</h3>
            <div class="form-group">
                <label for="name">Tên người nhận:</label>
                <input type="text" name="name" class="form-control" required value="{{ session('fullname') }}">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ giao hàng:</label>
                <input type="text" name="address" class="form-control" required placeholder="Nhập địa chỉ giao hàng">
            </div>
            <div class="form-group">
                <label for="name">Số điện thoại:</label>
                <input type="text" name="phone" class="form-control" required value="+84">
            </div>
            <div class="form-group">
                <label for="note">Ghi chú:</label>
                <textarea name="note" class="form-control" placeholder="Ghi chú về đơn hàng"></textarea>
            </div>

            <!-- Phương thức thanh toán -->
            <div class="form-group">
                <label for="payment">Phương thức thanh toán:</label>
                <select name="payment" class="form-control" required>
                    <option value="cod">Thanh toán khi nhận hàng (COD)</option>
                    <option value="bank">Chuyển khoản ngân hàng</option>
                    <option value="card">Thẻ tín dụng</option>
                </select>
            </div>

            <!-- Nút gửi form -->
            <button type="submit" class="btn btn-primary">Xác nhận thanh toán</button>
        </div>
    </form>
    @else
    <p>Giỏ hàng của bạn đang trống!</p>
    @endif
</div>

</body>
</html>