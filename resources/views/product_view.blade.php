<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/product_style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Thêm toastr CSS vào phần <head> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <title>Danh Sách Sản Phẩm</title>
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

    .cart-icon {
        position: fixed;
        bottom: 30px;
        right: 20px;
        font-size: 30px;
        background-color: white;
        /* Change background to black */
        color: black;
        /* Text color remains white */
        padding: 15px;
        border-radius: 50%;
        cursor: pointer;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .cart-icon .cart-badge {
        position: absolute;
        bottom: 0;
        /* Position the badge at the bottom */
        right: 0;
        /* Position the badge at the right */
        background-color: red;
        color: white;
        font-size: 12px;
        border-radius: 50%;
        padding: 2px 6px;
    }


    .product-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin: 20px;
    }

    .product {
        background-color: white;
        border: 1px solid #ddd;
        margin: 10px;
        width: 220px;
        /* Chiều rộng cố định */
        height: 380px;
        /* Chiều cao cố định */
        padding: 15px;
        text-align: center;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .product img {
        width: 100%;
        /* Đảm bảo ảnh rộng bằng chiều rộng của sản phẩm */
        height: 180px;
        /* Chiều cao ảnh cố định */
        object-fit: cover;
        border-radius: 8px;
    }

    .product-name {
        font-size: 16px;
        /* Kích thước chữ nhỏ hơn */
        font-weight: bold;
        /* Đảm bảo tên sản phẩm dễ nhìn */
        margin: 10px 0;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }

    .product-price {
        font-size: 14px;
        /* Kích thước chữ nhỏ hơn cho giá */
        color: #ff6600;
        /* Màu sắc nổi bật cho giá */
        font-weight: bold;
        margin-bottom: 10px;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }

    .product:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .add-to-cart {
        background-color: pink;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
        box-sizing: border-box;
        transition: background-color 0.3s ease;
    }

    .add-to-cart:hover {
        background-color: red;
    }

    .cart-container {
        position: fixed;
        top: 70px;
        right: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 300px;
        display: none;
        /* Initially hidden */
        z-index: 999;
        max-height: 400px;
        overflow-y: auto;
        border-radius: 8px;
    }

    .cart-container h3 {
        margin: 0;
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .cart-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .cart-item img {
        width: 40px;
        height: 40px;
        object-fit: cover;
        margin-right: 10px;
        border-radius: 5px;
    }

    .cart-item p {
        margin: 0;
        font-size: 14px;
    }

    .cart-total {
        font-weight: bold;
        margin-top: 20px;
        font-size: 16px;
        text-align: right;
    }

    .remove-btn {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        font-size: 12px;
        border-radius: 5px;
    }

    .remove-btn:hover {
        background-color: #c82333;
    }

    .quantity-control {
        display: flex;
        align-items: center;
    }

    .quantity-control button {
        background-color: #007BFF;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        font-size: 14px;
    }

    .quantity-control input {
        width: 40px;
        text-align: center;
        border: 1px solid #ccc;
        margin: 0 5px;
    }

    /* Media Queries for Mobile */
    @media (max-width: 768px) {
        .product-container {
            justify-content: space-between;
        }

        .product {
            width: 45%;
        }

        .cart-container {
            width: 250px;
            top: 60px;
        }
    }

    @media (max-width: 480px) {
        header h1 {
            font-size: 24px;
        }

        .product {
            width: 100%;
        }

        .cart-icon {
            top: 10px;
            right: 10px;
        }
    }
    </style>
</head>

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
                            <li><a href="{{url ('/hien-thi-san-pham')}}">shop</a></li>
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
                                <a href="{{ route('admin') }}"><img src="{{asset('img/admin-icon.png')}}" alt=""></a>
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
            <header>
                <div class="header-container">
                    <a href="{{ route('cart.index') }}" class="cart-icon">
                        🛒 <span class="cart-count">{{ session('cart') ? count(session('cart')) : 0 }}</span>
                    </a>
                </div>
            </header>
        </div>
        <!-- Header Section End -->
        <h1>Danh Sách Sản Phẩm</h1>
    </header>
    <div id="product-list" class="product-container">
        @foreach ($products as $product)
        <div class="product">
            <a href="{{ route('product.detail', ['id' => $product->product_ID]) }}">
                <img src="{{ asset($product->product_img) }}" alt="Sản phẩm {{ $product->product_name }}">
                <h2 class="product-name">{{ $product->product_name }}</h2>
                <p class="product-price">{{ number_format($product->product_price, 0, ',', '.') }},000 VNĐ</p>
                <a href="{{ route('cart.add', ['id' => $product->product_ID]) }}" class="add-to-cart">Thêm vào giỏ</a>
            </a>
        </div>
        @endforeach
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
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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