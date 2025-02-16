<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/product_style.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

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
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.html">Home</a></li>
                            <li><a href="#">Women’s</a></li>
                            <li><a href="#">Men’s</a></li>
                            <li><a href="./shop.html">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="./product-details.html">Product Details</a></li>
                                    <li><a href="./shop-cart.html">Shop Cart</a></li>
                                    <li><a href="./checkout.html">Checkout</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-">
                    <div class="header__right">
                        <div class="header__right__auth">
                            <a>
                                <?php if(session('fullname')): ?>
                                <a style="text-transform: uppercase;font-weight: bold;">Chào <?php echo e(session('fullname')); ?></a>
                                <form action="<?php echo e(route('logout')); ?>" method="POST" style="display: inline;">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="" style="border: none; background: none;">
                                        Logout
                                    </button>
                                </form>
                                <?php else: ?>
                                <a href="<?php echo e(url('/dang-nhap')); ?>">Login</a>

                                <a href="<?php echo e(url('/them-dang-ky')); ?>"> Register</a>
                                <?php endif; ?>
                            </a>
                        </div>
                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                            <li><a href="#"><span class="icon_heart_alt"></span>
                                    <div class="tip">2</div>
                                </a></li>
                            <li><a href="#"><span class="icon_bag_alt"></span>
                                    <div class="tip">2</div>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
        <!-- Header Section End -->
        <h1>Danh Sách Sản Phẩm</h1>
        <a href="javascript:void(0)" onclick="toggleCart()">
            <i class="fas fa-shopping-cart cart-icon">
                <span class="cart-badge" id="cart-badge">0</span>
            </i>
        </a>
    </header>

    <div class="product-container">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="product">
            <img src="<?php echo e(asset($product->product_img)); ?>" alt="Sản phẩm <?php echo e($product->product_name); ?>">
            <h2 class="product-name"><?php echo e($product->product_name); ?></h2>
            <p class="product-price"><?php echo e(number_format($product->product_price, 0, ',', '.')); ?>,000 VNĐ</p>
            <button class="add-to-cart"
                onclick="addToCart('<?php echo e($product->product_name); ?>', <?php echo e($product->product_price); ?>, '<?php echo e(asset($product->product_img)); ?>')">Thêm
                vào giỏ</button>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <!-- Discount Section Begin -->
    <section class="discount">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="discount__pic">
                        <img src="img/discount.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div style="height:585px" class="discount__text">
                        <div class="discount__text__title">
                            <span>Discount</span>
                            <h2>Summer 2024</h2>
                            <h5><span>Sale</span> 50%</h5>
                        </div>
                        <div class="discount__countdown" id="countdown-time">
                            <div class="countdown__item">
                                <span>21</span>
                                <p>Days</p>
                            </div>
                            <div class="countdown__item">
                                <span>18</span>
                                <p>Hour</p>
                            </div>
                            <div class="countdown__item">
                                <span>46</span>
                                <p>Min</p>
                            </div>
                            <div class="countdown__item">
                                <span>05</span>
                                <p>Sec</p>
                            </div>
                        </div>
                        <!-- <a href="#">Shop now</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Discount Section End -->
    <!-- Giỏ hàng (Hiển thị khi có sản phẩm trong giỏ) -->
    <div class="cart-container" id="cart-container">
        <h3>Giỏ Hàng</h3>
        <div id="cart-items"></div>
        <p class="cart-total">Tổng: <span id="cart-total">0</span>,000 VNĐ</p>
        <button onclick="window.location.href='/gio-hang'">Giỏ Hàng</button>
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
    <script>
    // Giỏ hàng lưu trữ trong localStorage
    function addToCart(productName, productPrice, productImage) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let productIndex = cart.findIndex(item => item.name === productName);

        if (productIndex !== -1) {
            cart[productIndex].quantity += 1; // Nếu sản phẩm đã có trong giỏ thì tăng số lượng
        } else {
            cart.push({
                name: productName,
                price: productPrice,
                image: productImage,
                quantity: 1
            });
        }

        localStorage.setItem('cart', JSON.stringify(cart));
        updateCart();
    }

    // Cập nhật hiển thị giỏ hàng
    function updateCart() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const cartContainer = document.getElementById('cart-container');
        const cartItemsContainer = document.getElementById('cart-items');
        const cartTotal = document.getElementById('cart-total');
        const cartBadge = document.getElementById('cart-badge');

        if (cart.length === 0) {
            cartContainer.style.display = 'none';
            cartBadge.textContent = '0'; // Hiển thị số lượng giỏ hàng
            return;
        }

        cartContainer.style.display = 'block';
        cartItemsContainer.innerHTML = '';
        let total = 0;
        let totalItems = 0;

        cart.forEach((item, index) => {
            const itemTotal = item.price * item.quantity;
            total += itemTotal;
            totalItems += item.quantity;

            cartItemsContainer.innerHTML += `
                    <div class="cart-item">
                        <img src="${item.image}" alt="${item.name}">
                        <p>${item.name}</p>
                        <div class="quantity-control">
                            <button onclick="updateQuantity(${index}, -1)">-</button>
                            <input type="text" value="${item.quantity}" readonly>
                            <button onclick="updateQuantity(${index}, 1)">+</button>
                        </div>
                        <button class="remove-btn" onclick="removeFromCart(${index})">Xóa</button>
                    </div>
                `;
        });

        cartTotal.textContent = total.toLocaleString();
        cartBadge.textContent = totalItems; // Hiển thị tổng số sản phẩm trong giỏ
    }

    // Hàm để cập nhật số lượng sản phẩm trong giỏ
    function updateQuantity(index, delta) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart[index].quantity += delta;

        // Đảm bảo số lượng không nhỏ hơn 1
        if (cart[index].quantity < 1) {
            cart[index].quantity = 1;
        }

        localStorage.setItem('cart', JSON.stringify(cart));
        updateCart();
    }

    // Hàm xóa sản phẩm khỏi giỏ hàng
    function removeFromCart(index) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCart();
    }

    // Hàm toggle giỏ hàng
    function toggleCart() {
        const cartContainer = document.getElementById('cart-container');
        if (cartContainer.style.display === 'block') {
            cartContainer.style.display = 'none';
        } else {
            updateCart();
            cartContainer.style.display = 'block';
        }
    }

    // Khởi tạo giỏ hàng khi tải trang
    updateCart();
    </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\laravel-tutorial\resources\views/product_view.blade.php ENDPATH**/ ?>