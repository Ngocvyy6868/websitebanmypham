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
    <title>Thông Tin Người Dùng</title>
    <style>
    body {
        font-family: 'Montserrat', sans-serif;
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

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .profile-card {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }

    .card-header {
        background-color: #007bff;
        color: white;
        font-size: 22px;
        padding: 15px;
        text-transform: uppercase;
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        padding: 25px;
    }

    .profile-img {
        width: 250px;
        /* Tăng kích thước ảnh */
        height: 250px;
        /* Tăng kích thước ảnh */
        object-fit: cover;
        margin-bottom: 20px;
        border: 3px solid #007bff;
        /* Tăng kích thước viền */
        /* border-radius: 20%; Đảm bảo ảnh tròn */
    }

    .profile-info .row {
        margin-bottom: 15px;
    }

    .profile-info .col-md-4 {
        font-weight: bold;
        color: #333;
    }

    .profile-info .col-md-8 {
        font-size: 16px;
        color: #555;
    }

    .profile-info .row strong {
        font-size: 16px;
    }

    .btn-primary {
        padding: 12px 30px;
        background-color: #007bff;
        border-radius: 5px;
        font-size: 16px;
        text-decoration: none;
        color: white;
        text-transform: uppercase;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap');
    </style>
</head>

<body>
    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
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
    </header>
    <button class="back-btn" onclick="window.history.back();">Trở về</button>
    <div class="container mt-5">
        <div class="card profile-card shadow-sm">
            <div class="card-header text-center">
                <h3 class="mb-0">Thông tin cá nhân</h3>
            </div>
            <div class="card-body">
                <!-- Hiển thị ảnh -->
                <div class="text-center mb-4">
                    <?php if($profile->img): ?>
                    <img src="<?php echo e(asset($profile->img)); ?>" alt="Profile Image" class="profile-img rounded-circle">
                    <?php else: ?>
                    <div class="text-center">
                        <p>Chưa có ảnh đại diện.</p>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Thông tin cá nhân -->
                <div class="profile-info mb-4">
                    <div class="row">
                        <div class="col-md-4"><strong>Họ và tên:</strong></div>
                        <div class="col-md-8"><?php echo e($profile->fullname); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><strong>Email:</strong></div>
                        <div class="col-md-8"><?php echo e($profile->email); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><strong>Ngày sinh:</strong></div>
                        <div class="col-md-8"><?php echo e($profile->birthday); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><strong>Số điện thoại:</strong></div>
                        <div class="col-md-8"><?php echo e($profile->phone); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><strong>Địa chỉ:</strong></div>
                        <div class="col-md-8"><?php echo e($profile->address); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><strong>Tiểu Sử:</strong></div>
                        <div class="col-md-8"><?php echo e($profile->bio); ?></div>
                    </div>
                </div>

                <!-- Nút chỉnh sửa hồ sơ -->
                <div class="text-center">
                    <a href="<?php echo e(route('change-password.form')); ?>" class="btn btn-primary">Đổi Mật Khẩu</a>
                    <a href="<?php echo e(route('profile.edit')); ?>" class="btn btn-primary">Chỉnh sửa hồ sơ</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\ngocvy\resources\views/profile.blade.php ENDPATH**/ ?>