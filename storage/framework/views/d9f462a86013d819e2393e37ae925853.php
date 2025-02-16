<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div style="width: 300px; padding: 10px" class="container mt-3">
  <h2>Đăng nhập</h2>

  <!-- Hiển thị thông báo lỗi nếu có -->
  <?php if($errors->any()): ?>
    <div class="alert alert-danger">
      <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
  <?php endif; ?>

  <form action="<?php echo e(url('act_login')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="text" name="username" placeholder="Username" class="form-control mb-2" required><br>
    <input type="password" name="password" placeholder="Password" class="form-control mb-2" required><br>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
</div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel-tutorial\resources\views/login.blade.php ENDPATH**/ ?>