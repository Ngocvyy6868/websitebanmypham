<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">

    <title>Danh Sách Đặt Hàng</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
    }

    header {
        text-align: center;
    }

    header h1 {
        font-family: "Times New Roman", Times, serif;
        text-transform: uppercase;
        height: 50px;
        background-color: pink;
        margin: 0;
        font-size: 28px;
    }


    .cart-container {
        max-width: 1200px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        text-align: left;
        padding: 12px;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f4f4f4;
        font-weight: 600;
    }

    td img {
        width: 80px;
        height: auto;
        border-radius: 4px;
    }

    .btn {
        padding: 10px 15px;
        border-radius: 4px;
        text-decoration: none;
        color: #fff;
        display: inline-block;
        text-align: center;
        font-size: 14px;
    }

    .btn-danger {
        background-color: #ff6f61;
        border: none;
    }

    .btn-danger:hover {
        background-color: #e84a3a;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .cart-summary {
        text-align: right;
        font-size: 18px;
        font-weight: bold;
    }

    .cart-summary h3 {
        color: #333;
    }

    .update-btn {
        margin-top: 10px;
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        font-size: 14px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        float: right;
        /* Đẩy nút cập nhật về bên phải */
    }

    .update-btn:hover {
        background-color: #0056b3;
    }

    .cart-empty {
        text-align: center;
        font-size: 18px;
        color: #555;
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
        margin-left: 20px;
        /* Tăng giá trị để di chuyển nút sang phải */
        float: right;
        /* Đưa nút sang phía bên phải */
    }


    .back-btn:hover {
        background-color: #218838;
    }

    .cart-actions {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        /* Giữa các nút */
    }

    .cart-actions .checkout-btn {
        padding: 10px 25px;
        background-color: #ff6f61;
        color: white;
        font-size: 16px;
        border-radius: 5px;
        text-decoration: none;
    }

    .cart-actions .checkout-btn:hover {
        background-color: #e84a3a;
    }

    /* Kiểu tiêu đề đẹp cho Giỏ Hàng */
    .cart-title {
        text-align: center;
        font-size: 36px;
        font-weight: 700;
        color: #333;
        text-transform: uppercase;
        letter-spacing: 2px;
        padding: 20px 0;
        background: linear-gradient(45deg, #6a82fb, #fc5c7d);
        color: white;
        border-radius: 12px;
        font-family: 'Times New Roman', serif;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        font-family: 'Roboto', sans-serif;
        letter-spacing: 3px;
        transition: all 0.3s ease;
    }

    /* Phong cách chỉnh sửa khi tiêu đề có focus hoặc được chọn */
    .cart-title:focus {
        outline: none;
        /* Loại bỏ viền mặc định khi focus */
        border: 2px solid #fc5c7d;
        /* Thêm viền khi tiêu đề được chọn */
    }
    </style>
</head>

<body>

    <body class="homepage">
        <!-- Header Section Begin -->
        <header class="header">
            <div class="container-fluid">
                <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.jpg" alt="" style="width: 70px; height: auto;"></a>
                    </div>
                </div>
                    <div class="col-xl-6 col-lg-7">
                        <nav class="header__menu">
                            <ul>
                                <li class="active"><a href="{{url ('/trang-chu')}}">Home</a></li>
                                <li><a href="{{url ('/hien-thi-san-pham')}}">shop</a>
                                    <!-- <ul class="dropdown">
                                    <li><a href="./product-details.html">Product Details</a></li>
                                    <li><a href="./shop-cart.html">Shop Cart</a></li>
                                    <li><a href="./checkout.html">Checkout</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul> -->
                                </li>
                                <li><a href="{{ url('/lien-he') }}">Contact</a></li>
                                <li><a href="{{ url('/danh-sach-da-dat-hang') }}">Order</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-">
                        <div class="header__right">
                            <div class="header__right__auth">
                                <a>
                                    @if (session('role') == 1)
                                    <!-- Hiển thị nút vào trang admin nếu là admin -->
                                    <a href="{{ route('admin') }}"><img src="{{asset('img/admin-icon.png')}}"
                                            alt=""></a>
                                    @endif
                                    @if (session('fullname'))
                                    <a href="{{ route('profile') }}"
                                        style="text-transform: uppercase; font-weight: bold;">Chào
                                        {{ session('fullname') }}</a>
                                    <!-- Đăng xuất -->
                                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" style="border: none; background: none;">Logout</button>
                                    </form>
                                    @else
                                    <a href="{{ url('/dang-nhap') }}">Login</a>
                                    <a href="{{ url('/them-dang-ky') }}">Register</a>
                                    @endif

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header Section End -->
                <h1>Danh Sách Đặt Hàng</h2>
        </header>
        <div class="container mt-5">
            <!-- <h1 style="text-align:center;" class="cart-title">Danh sách đơn hàng</h1> -->
            <button class="back-btn" onclick="window.location.href='{{ url()->previous() }}';">Trở về</button>

            @if($orders->isEmpty())
            <div class="alert alert-info" role="alert">
                Hiện tại bạn chưa có đơn hàng nào.
            </div>
            @else
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tên người đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->order_user }}</td> <!-- Tên người đặt -->
                        <td>{{ number_format($order->total_amount, 0, ',', ',') }},000 VND</td>
                        <!-- Hiển thị tổng tiền -->
                        <td>
                            <span class="badge {{ $order->status == 'pending' ? 'bg-warning' : 'bg-success' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($order->create_at)->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('order.show', $order->order_id) }}" class="btn btn-primary btn-sm">Xem chi
                                tiết</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
        <!-- Footer Section Begin -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-7">
                        <div class="footer__about">
                            <div class="footer__logo">
                                <a href="./index.html"><img src="img/logo.png" alt=""></a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                cilisis.</p>
                            <div class="footer__payment">
                                <a href="#"><img src="img/payment/payment-1.png" alt=""></a>
                                <a href="#"><img src="img/payment/payment-2.png" alt=""></a>
                                <a href="#"><img src="img/payment/payment-3.png" alt=""></a>
                                <a href="#"><img src="img/payment/payment-4.png" alt=""></a>
                                <a href="#"><img src="img/payment/payment-5.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-5">
                        <div class="footer__widget">
                            <h6>Quick links</h6>
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Blogs</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="footer__widget">
                            <h6>Account</h6>
                            <ul>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Orders Tracking</a></li>
                                <li><a href="#">Checkout</a></li>
                                <li><a href="#">Wishlist</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-8">
                        <div class="footer__newslatter">
                            <h6>NEWSLETTER</h6>
                            <form action="#">
                                <input type="text" placeholder="Email">
                                <button type="submit" class="site-btn">Subscribe</button>
                            </form>
                            <div class="footer__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <div class="footer__copyright__text">
                            <p>Copyright &copy; <script>
                                document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="fa fa-heart"
                                    aria-hidden="true"></i> by <a href="https://colorlib.com"
                                    target="_blank">Colorlib</a>
                            </p>
                        </div>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->
    </body>

</html>