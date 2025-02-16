<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thêm Người Dùng Mới</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/styles.css" type="text/css">
  <style>
    body {
      background-size: cover;
      color: white;
      font-family: 'Arial', sans-serif;
    }
    h1 {
      margin: 20px 0;
      text-align: center;
      color: #ffdd57;
      font-weight: bold;
    }
    .container {
      border-radius: 1rem;
      padding: 40px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.8);
      transition: transform 0.3s;
      background-color:#fce4ec; /* Màu nền bảng trắng */
    }
    .container:hover {
      transform: scale(1.02);
    }
    .table {
      border-radius: 0.5rem;
      overflow: hidden;
      background-color: #fce4ec; /* Màu nền bảng trắng */
    }
    .btn-submit {
      background: linear-gradient(to right, #ff416c, #ff4b2b);
      color: white;
      padding: 12px 25px;
      font-size: 18px;
      border: none;
      border-radius: 8px;
      transition: transform 0.2s, box-shadow 0.3s;
      margin: 30px auto;
      display: block;
      text-align: center;
    }
    .btn-submit:hover {
      transform: scale(1.08);
      box-shadow: 0 6px 25px rgba(255, 65, 108, 0.6);
    }
    .form-control {
      border-radius: 0.5rem;
    }
    select {
      width: 100%;
      padding: 10px;
      border-radius: 0.5rem;
      border: 1px solid #ddd;
    }
    img {
      border-radius: 8px;
      margin-top: 10px;
    }
  </style>
</head>


<?php $__env->startSection('content'); ?>
<body>
  <div class="container">
    <h1>Thêm Người Dùng Mới</h1>
    <form action="/them-user" method="post">
      <?php echo csrf_field(); ?>
      <table class="table table-striped table-hover">
        <tr>
          <td>Tài Khoản</td>
          <td><input type="text" class="form-control" name="txt_username" required></td>
        </tr>
        <tr>
          <td>Họ Tên</td>
          <td><input type="text" class="form-control" name="txt_fullname" required></td>
        </tr>
        <tr>   
          <td>Mật Khẩu</td>
          <td><input type="password" class="form-control" name="txt_password" required></td>
        </tr>
      </table>
        <input type="submit" class="btn-submit" value="Cập Nhật">
    </form>
  </div>
</body>
</html>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ngocvy\resources\views/add_user.blade.php ENDPATH**/ ?>