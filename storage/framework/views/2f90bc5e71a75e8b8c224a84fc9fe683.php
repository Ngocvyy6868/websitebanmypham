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
    <h1 class="text-center">DANH SÁCH DANH MỤC</h1>
    <a href="them-danh-muc" class="btn">
      <img src="<?php echo e(asset('img/add.png')); ?>" class="icon" alt=""> Thêm Danh Mục
    </a>
    
    <table class="table table-striped table-hover">
      <thead class="table-danger">
        <tr>
          <th>Mã Danh Mục</th>
          <th>Tên Danh Mục</th>
          <th>Mô Tả Danh Mục</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($item->cate_ID); ?></td>
            <td><?php echo e($item->cate_name); ?></td>
            <td><?php echo e($item->cate_des); ?></td>
            <td>
              <a href="thong-tin-danh-muc/<?php echo e($item->cate_ID); ?>">
                <img src="<?php echo e(asset('img/edit.png')); ?>" class="icon" alt="">
              </a>
            </td>
            <td>
              <a href="xoa-danh-muc/<?php echo e($item->cate_ID); ?>">
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
<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ngocvy\resources\views/cate_list.blade.php ENDPATH**/ ?>