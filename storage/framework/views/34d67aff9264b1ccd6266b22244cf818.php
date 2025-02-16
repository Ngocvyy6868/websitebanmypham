

<?php $__env->startSection('content'); ?>
<body>
<div class="container mt-4">
    
    <h1 class="text-center">DANH SÁCH TẤT CẢ ĐƠN HÀNG</h1>

    <?php if($orders->isEmpty()): ?>
        <p>Không có đơn hàng nào.</p>
    <?php else: ?>
        <table class="table table-striped table-hover">
        <thead class="table-danger">
            <tr>
                <th>Mã đơn hàng</th>
                <th>Người dùng</th>
                <th>Trạng thái</th>
                <th>Tổng tiền</th>
                <th>Thanh toán</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($order->order_id); ?></td>
                    <td><?php echo e($order->order_user); ?></td>
                    <td><?php echo e($order->status); ?></td>
                    <td><?php echo e(number_format($order->total_amount, 0, ',', '.')); ?> VND</td>
                    <td><?php echo e($order->payment); ?></td>
                    <td><?php echo e($order->create_at); ?></td>
                    <td>
                        <!-- Form to update the order status -->
                        <form action="<?php echo e(route('orders.updateStatus', $order->order_id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <select name="status" class="form-select" onchange="this.form.submit()">
                                <option value="pending" <?php echo e($order->status == 'pending' ? 'selected' : ''); ?>>Chờ xử lý</option>
                                <option value="processing" <?php echo e($order->status == 'processing' ? 'selected' : ''); ?>>Đang xử lý</option>
                                <option value="completed" <?php echo e($order->status == 'completed' ? 'selected' : ''); ?>>Hoàn thành</option>
                                <option value="cancelled" <?php echo e($order->status == 'cancelled' ? 'selected' : ''); ?>>Đã hủy</option>
                            </select>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        </table>
    <?php endif; ?>
</div>
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ngocvy\resources\views/order_list.blade.php ENDPATH**/ ?>