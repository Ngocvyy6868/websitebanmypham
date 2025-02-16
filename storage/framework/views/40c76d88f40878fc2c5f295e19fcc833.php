<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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
    <title>Giỏ Hàng</title>
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
        float: right;
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
        font-family: "Times New Roman", Times, serif;
        text-transform: uppercase;
        height: 50px;
        background-color: pink;
        margin: 0;
        font-size: 28px;

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
                            <li class="active"><a href="<?php echo e(url ('/trang-chu')); ?>">Home</a></li>
                            <li><a href="<?php echo e(url ('/hien-thi-san-pham')); ?>">shop</a>
                                <!-- <ul class="dropdown">
                                    <li><a href="./product-details.html">Product Details</a></li>
                                    <li><a href="./shop-cart.html">Shop Cart</a></li>
                                    <li><a href="./checkout.html">Checkout</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul> -->
                            </li>
                            <li><a href="<?php echo e(url('/lien-he')); ?>">Contact</a></li>
                            <li><a href="<?php echo e(url('/danh-sach-da-dat-hang')); ?>">Order</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-">
                    <div class="header__right">
                        <div class="header__right__auth">
                            <a>
                                <?php if(session('role') == 1): ?>
                                <!-- Hiển thị nút vào trang admin nếu là admin -->
                                <a href="<?php echo e(route('admin')); ?>"><img src="<?php echo e(asset('img/admin-icon.png')); ?>" alt=""></a>
                                <?php endif; ?>
                                <?php if(session('fullname')): ?>
                                <a href="<?php echo e(route('profile')); ?>"
                                    style="text-transform: uppercase; font-weight: bold;">Chào
                                    <?php echo e(session('fullname')); ?></a>
                                <!-- Đăng xuất -->
                                <form action="<?php echo e(route('logout')); ?>" method="POST" style="display: inline;">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" style="border: none; background: none;">Logout</button>
                                </form>
                                <?php else: ?>
                                <a href="<?php echo e(url('/dang-nhap')); ?>">Login</a>
                                <a href="<?php echo e(url('/them-dang-ky')); ?>">Register</a>
                                <?php endif; ?>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Section End -->
            <h1>Danh Sách Đặt Hàng</h2>
    </header>
    <div class="cart-container">
        <button class="back-btn" style="float:left;"
            onclick="window.location.href='<?php echo e(url('/danh-sach-da-dat-hang')); ?>';">Danh sách đơn hàng</button>
        <button class="back-btn" onclick="window.location.href='<?php echo e(url('/hien-thi-san-pham')); ?>';">Trở về</button>
        <?php if(session('cart') && count(session('cart')) > 0): ?>
        <form action="<?php echo e(route('cart.update')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <table>
                <thead>
                    <tr>
                        <th>Hình Ảnh</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Tổng</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    $totalQuantity = 0;
                    ?>
                    <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $price = $details['price'] ?? 0;
                    $quantity = $details['quantity'] ?? 0;
                    $total += $price * $quantity;
                    $totalQuantity += $quantity; // Cộng dồn số lượng
                    ?>
                    <tr>
                        <td>
                            <img src="<?php echo e(asset($details['image'])); ?>" alt="<?php echo e($details['name']); ?>">
                        </td>
                        <td><?php echo e($details['name']); ?></td>
                        <td><?php echo e(number_format($price, 0, ',', '.')); ?> ,000 VNĐ</td>
                        <td>
                            <input type="number" name="quantities[<?php echo e($id); ?>]" value="<?php echo e($quantity); ?>" min="1"
                                class="form-control" style="width: 80px;">
                        </td>
                        <td><?php echo e(number_format($price * $quantity, 0, ',', '.')); ?> ,000 VNĐ</td>
                        <td>
                            <a href="<?php echo e(route('cart.remove', $id)); ?>" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <div class="cart-summary">
                <h5>Tổng cộng: <?php echo e(number_format($total, 0, ',', ',')); ?> ,000 VNĐ</h5>
                <h5><strong>Tổng số lượng: </strong><?php echo e($totalQuantity); ?></h5> <!-- Hiển thị tổng số lượng -->
            </div>
            <button type="submit" class="update-btn">Cập Nhật Tất Cả</button>
        </form>
        <?php else: ?>
        <p class="cart-empty">Giỏ hàng của bạn đang trống!</p>
        <?php endif; ?>

        <div class="cart-actions">
            <a href="<?php echo e(route('checkout')); ?>" class="checkout-btn">Thanh toán</a>
        </div>
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

</html><?php /**PATH C:\xampp\htdocs\22662051_NguyenThiNgocVy\22662051_NguyenThiNgocVy_PhanCode\resources\views/cart.blade.php ENDPATH**/ ?>