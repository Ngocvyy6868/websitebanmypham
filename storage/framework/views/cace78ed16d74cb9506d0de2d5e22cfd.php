<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin đơn hàng</title>
    <style>
        /* CSS for the order details page */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .order-container {
            width: 75%;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .order-title {
            font-size: 32px;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
        }

        .order-details p {
            font-size: 18px;
            margin: 12px 0;
            line-height: 1.8;
            color: #555;
        }

        .order-details strong {
            color: #333;
        }

        .order-detail-title {
            font-size: 24px;
            margin-top: 40px;
            color: #333;
            font-weight: 700;
            border-bottom: 3px solid #00bfae;
            padding-bottom: 10px;
            text-align: center;
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        .order-table th, .order-table td {
            padding: 14px 20px;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 16px;
            color: #555;
        }

        .order-table th {
            background-color: #f1f1f1;
            color: #333;
            font-weight: 700;
        }

        .order-table tr:hover {
            background-color: #f9f9f9;
        }

        .order-table td:last-child {
            text-align: right;
        }

        .order-summary {
            margin-top: 40px;
            padding: 15px;
            background-color: #f7f7f7;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: right;
        }

        .order-summary p {
            font-size: 18px;
            margin: 8px 0;
            font-weight: 700;
            color: #333;
        }

        .order-summary p span {
            font-weight: 400;
            color: red;
            font-weight: bold;
        }
        .button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin: 10px;
        }
        
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="order-container">
<button class="button" onclick="window.history.back();">Trở về trang trước</button>
<a href="<?php echo e(url ('/hien-thi-san-pham')); ?>" class="button">Trang chủ</a>
    <h3 class="order-title">Thông tin đơn hàng</h3>
    <div class="order-details">
        <p><strong>Mã Đơn hàng:</strong> <?php echo e($order->order_id); ?></p>
        <p><strong>Người đặt:</strong> <?php echo e($order->order_user); ?></p>
        <p><strong>Địa chỉ:</strong> <?php echo e($order->address); ?></p>
        <p><strong>Số điện thoại:</strong> <?php echo e($order->phone); ?></p>
        <p><strong>Ghi chú:</strong> <?php echo e($order->note); ?></p>
        <p><strong>Phương thức thanh toán:</strong> <?php echo e($order->payment); ?></p>
        <p><strong>Trạng thái đơn hàng:</strong> <?php echo e($order->status); ?></p>
    </div>

    <h4 class="order-detail-title">Chi tiết sản phẩm</h4>
    <table class="order-table">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng giá</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($detail->product_name); ?></td>
                    <td><?php echo e(number_format($detail->product_price)); ?>,000 VND</td>
                    <td><?php echo e($detail->quantity); ?></td>
                    <td><?php echo e(number_format($detail->quantity * $detail->product_price)); ?>,000 VND</td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="order-summary">
        <p><strong>Tổng cộng:</strong> <span><?php echo e(number_format($order->total_amount)); ?>,000 VND</span></p>
    </div>
</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ngocvy\resources\views/order_show.blade.php ENDPATH**/ ?>