<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thông Tin Người Dùng</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background: url('https://img.freepik.com/free-vector/hand-drawn-background-fall-season_23-2150645540.jpg?t=st=1730359918~exp=1730363518~hmac=573dc7869ed7bcf4e527474109680dde3e9df1d7a0b77e34e63d27fbc1092abe&w=900') no-repeat center center fixed;
      background-size: cover;
      color: white;
    }
    h1 {
      margin-top: 20px;
      margin-bottom: 20px;
      text-align: center;
      font-family: 'Arial', sans-serif;
      text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.7);
    }
    .container {
      background: rgba(0, 0, 0, 0.7); /* Giảm độ mờ cho nền container */
      border-radius: 1rem;
      padding: 30px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.8);
      transition: transform 0.3s;
    }
    .container:hover {
      transform: scale(1.02); /* Hiệu ứng phóng to khi hover */
    }
    .table {
      border-radius: 0.5rem;
      overflow: hidden;
      background-color: rgba(255, 255, 255, 0.15); /* Nền bảng sáng hơn */
    }
    .table-light {
      transition: background-color 0.3s;
    }
    .table-light:hover {
      background-color: rgba(255, 255, 255, 0.3); /* Màu nền khi hover */
    }
    .btn-submit {
      background: linear-gradient(to right, #ff416c, #ff4b2b);
      color: white;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      transition: background-color 0.3s, transform 0.2s, box-shadow 0.2s;
      display: block;
      margin: 20px auto;
    }
    .btn-submit:hover {
      transform: scale(1.05); /* Tăng kích thước khi hover */
      box-shadow: 0 4px 20px rgba(255, 65, 108, 0.5);
    }
    .table td {
      vertical-align: middle;
    }
  </style>
</head>
<body>
  <div class="container mt-4">
    <h1>Thông Tin Người Dùng</h1>
    <form action="/cap-nhat-danh-muc" method="post">
      <?php echo csrf_field(); ?>
      <table class="table table-bordered">
        <tbody>
          <tr class="table-danger">
            <td>Mã Danh Mục</td>
            <td><input type="hidden" value="<?php echo e($item[0]->cate_ID); ?>" name="txt_id"><?php echo e($item[0]->cate_ID); ?></td>
          </tr>
          <tr class="table-light">
            <td>Tên Danh Mục</td>
            <td><input type="text" class="form-control" value="<?php echo e($item[0]->cate_name); ?>" name="txt_name" required></td>
          </tr>
          <tr class="table-info">    
            <td>Mô Tả</td>
            <td><input type="text" class="form-control" value="<?php echo e($item[0]->cate_des); ?>" name="txt_des" required></td>
          </tr>
        </tbody>
      </table>
      <input type="submit" class="btn-submit" value="Cập Nhật">
    </form>
  </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel-tutorial\resources\views/cate_info.blade.php ENDPATH**/ ?>