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

    .cart-actions {
        margin: 20px;
        text-align: right;
    }

    .back-btn {
        font-family: 'Times New Roman', sans-serif;
        padding: 10px 20px;
        background: black;
        color: pink;
        font-weight: bold;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .back-btn:hover {
        background-color: pink;
        color: black;
    }

    .cart-items-container {
        margin: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .cart-items-container table {
        width: 100%;
        border-collapse: collapse;
    }

    .cart-items-container th {
        padding: 12px;
        color: black;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .cart-items-container td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .cart-items-container th {
        background-color: #f1f1f1;
    }

    .product-name img {
        width: 50px;
        height: 50px;
        margin-right: 10px;
    }

    .remove-btn {
        padding: 5px 10px;
        background-color: #e6e6fa;
        color: black;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .remove-btn:hover {
        background-color: rgb(194, 30, 86);
        color: white;
    }

    .update-btn {
        padding: 5px 10px;
        background-color: #e6e6fa;
        color: black;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .update-btn:hover {
        background-color: #228B22;
        color: white;
    }

    .cart-total {
        margin: 20px;
        text-align: right;
        font-size: 18px;
        font-weight: bold;
        color: black;
    }

    .checkout-btn {
        padding: 15px 30px;
        background-color: #e6e6fa;
        color: black;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
        display: block;
        margin: 0 auto;
    }

    .checkout-btn:hover {
        background-color: rgb(52, 152, 219);
    }

    .centered-button {
        margin-top: 30px;
    }

    .total-label {
        color: Black;
        font-weight: bold;
    }

    .total-amount {
        color: red;
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
        <h1>Giỏ Hàng</h1>
    </header>

    <div class="cart-actions">
        <button class="back-btn" onclick="goBack()">Quay lại</button>
    </div>

    <div id="cart-items-container" class="cart-items-container">
        <!-- Các sản phẩm sẽ được hiển thị ở đây -->
    </div>

    <div class="cart-total total-amount">
        <span class="total-label">Tổng cộng:</span>
        <span id="cart-total" class="total-amount"></span>,000 VNĐ
    </div>

    <div class="centered-button">
        <button class="checkout-btn" onclick="checkout()">Thanh Toán</button>
    </div>

    <script>
    // Retrieve cart items from localStorage
    function getCart() {
        return JSON.parse(localStorage.getItem('cart')) || [];
    }

    // Save cart items to localStorage
    function saveCart(cart) {
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    // Function to render cart items
    function renderCart() {
        const cart = getCart();
        const cartItemsContainer = document.getElementById('cart-items-container');
        const cartTotal = document.getElementById('cart-total');

        if (cart.length === 0) {
            cartItemsContainer.innerHTML = "<p>Giỏ hàng của bạn hiện tại trống.</p>";
            cartTotal.textContent = '0';
            return;
        }

        let total = 0;
        let html = '<table><tr><th>Sản phẩm</th><th>Giá</th><th>Số lượng</th><th>Thao tác</th></tr>';

        cart.forEach((item, index) => {
            const itemTotal = item.price * item.quantity;
            total += itemTotal;

            html += `
                    <tr>
                        <td class="product-name">
                            <img src="${item.image}" alt="${item.name}">
                            ${item.name}
                        </td>
                        <td>${item.price.toLocaleString()},000 VNĐ</td>
                        <td>
                            <input type="number" id="quantity-${index}" value="${item.quantity}" min="1" style="width: 60px;">
                        </td>
                        <td>
                            <button class="update-btn" onclick="updateQuantity(${index})">Cập nhật</button>
                            <button class="remove-btn" onclick="removeFromCart(${index})">Xóa</button>
                        </td>
                    </tr>
                `;
        });

        html += '</table>';
        cartItemsContainer.innerHTML = html;
        cartTotal.textContent = total.toLocaleString();
    }

    // Function to remove an item from the cart
    function removeFromCart(index) {
        const cart = getCart();
        cart.splice(index, 1);
        saveCart(cart);
        renderCart();
    }

    // Function to update the quantity of an item in the cart
    function updateQuantity(index) {
        const newQuantity = document.getElementById(`quantity-${index}`).value;
        const cart = getCart();

        if (newQuantity < 1) {
            alert('Số lượng phải lớn hơn hoặc bằng 1!');
            return;
        }

        cart[index].quantity = parseInt(newQuantity);
        saveCart(cart);
        renderCart();
    }

    // Function to handle checkout process
    function checkout() {
        const cart = getCart();
        if (cart.length === 0) {
            alert('Giỏ hàng của bạn trống. Không thể thanh toán.');
        } else {
            alert('Quá trình thanh toán đã được bắt đầu!');
            // Redirect to payment page or similar
            // window.location.href = '/checkout'; // Example
        }
    }

    // Function to go back to the previous page
    function goBack() {
        window.history.back();
    }

    // Initialize the cart on page load
    renderCart();
    </script>

</body>

</html><?php /**PATH C:\xampp\htdocs\laravel-tutorial\resources\views/cart.blade.php ENDPATH**/ ?>