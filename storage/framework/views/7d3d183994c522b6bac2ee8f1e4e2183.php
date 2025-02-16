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
  <form action="/act_login" method="post">
  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    <div class="mb-3 mt-3">
      <label for="name">Tên Đăng Nhập</label>
      <input type="text" class="form-control" id="name" placeholder="Nhập họ tên" name="name">
    </div>
    <div class="mb-3">
      <label for="pswd">Mật khẩu</label>
      <input type="password" class="form-control" id="pswd" placeholder="Nhập mật khẩu" name="pswd">
    </div>
    <button type="submit" class="btn btn-primary">Gửi</button>
  </form>
</div>

</body>
</html><?php /**PATH C:\xampp\htdocs\laravel-tutorial\resources\views/Login.blade.php ENDPATH**/ ?>