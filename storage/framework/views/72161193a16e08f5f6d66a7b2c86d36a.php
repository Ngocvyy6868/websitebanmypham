<!DOCTYPE html>
<html lang="en">
<head>
  <title>Danh Sách Người Dùng</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>


<?php $__env->startSection('content'); ?>
<body>
  <div class="container mt-4">
    <h1 class="text-center">DANH SÁCH SẢN PHẨM</h1>
    <a href="them-san-pham" class="btn">
      <img src="<?php echo e(asset('img/add.png')); ?>" class="icon" alt=""> Thêm Sản Phẩm
    </a>
    
    <table class="table table-striped table-hover">
      <thead class="table-danger">
        <tr>
          <th>Mã Sản Phẩm</th>
          <th>Tên Sản Phẩm</th>
          <th>Danh Mục</th>
          <th>Hình Ảnh</th>
          <th>Mô Tả</th>
          <th>Số Lượng</th>
          <th>Giá Bán</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($item->product_ID); ?></td>
            <td><?php echo e($item->product_name); ?></td>
            <td><?php echo e($item->cate_name); ?></td>
            <td><img src="<?php echo e(asset($item->product_img)); ?>" width="100" alt=""></td>
            <td><?php echo e($item->product_des); ?></td>
            <td><?php echo e($item->product_quantity); ?></td>
            <td><?php echo e($item->product_price); ?></td>
            <td>
              <a href="thong-tin-san-pham/<?php echo e($item->product_ID); ?>">
                <img src="<?php echo e(asset('img/edit.png')); ?>" class="icon" alt="">
              </a>
            </td>
            <td>
              <a href="xoa-san-pham/<?php echo e($item->product_ID); ?>">
                <img src="<?php echo e(asset('img/delete.png')); ?>" class="icon" alt="">
              </a>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     
    </table>
  </div>
</body>
</html>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ngocvy\resources\views/product_list.blade.php ENDPATH**/ ?>