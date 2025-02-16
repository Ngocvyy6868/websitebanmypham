<!DOCTYPE html>
<html lang="en">
<head>
  <title>Danh Sách Người Dùng</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background: url('https://img.freepik.com/free-vector/hand-drawn-background-fall-season_23-2150645540.jpg?t=st=1730359918~exp=1730363518~hmac=573dc7869ed7bcf4e527474109680dde3e9df1d7a0b77e34e63d27fbc1092abe&w=900') no-repeat center center fixed;
      background-size: cover;
      color: #333;
    }
    .container {
      border-radius: 1.5rem;
      padding: 30px;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .container:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.8);
    }
    .table {
      border-radius: 0.5rem;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }
    .table th, .table td {
      vertical-align: middle;
      padding: 15px;
    }
    .table-hover tbody tr:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }
    h1 {
      color: #fff;
      margin-top: 20px;
      margin-bottom: 20px;
      text-align: center;
      font-family: 'Arial', sans-serif;
      text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.8);
    }
    .btn {
      margin-top: 10px;
      margin-bottom: 10px;
      font-weight: bold;
      padding: 12px 25px;
      border-radius: 25px;
      border: none;
      position: relative;
      overflow: hidden;
      color: white;
      background: linear-gradient(90deg, #6f42c1, #007bff);
      transition: background 0.3s, transform 0.3s;
      font-size: 18px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }
    .btn:hover {
      transform: scale(1.05);
    }
    .btn:after {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 300%;
      height: 300%;
      background: rgba(255, 255, 255, 0.2);
      border-radius: 50%;
      transform: translate(-50%, -50%) scale(0);
      transition: transform 0.5s ease;
    }
    .btn:hover:after {
      transform: translate(-50%, -50%) scale(1);
    }
    .table-danger {
      background-color: #ffdddd;
    }
    .icon {
      width: 30px;
      height: auto;
    }
  </style>
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
<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-tutorial\resources\views/product_list.blade.php ENDPATH**/ ?>