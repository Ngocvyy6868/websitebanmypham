<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    /* Cài đặt cơ bản */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f7fa;
      display: flex;
      height: 100vh;
    }

    /* Thanh sidebar */
    .sidebar {
      width: 250px;
      background: linear-gradient(135deg, #1b2a41, #4c4e84, #8e44ad, #4d6c91);
      color: white;
      padding: 20px;
      height: 100%;
      box-shadow: 4px 0 8px rgba(0, 0, 0, 0.1);
    }

    .sidebar h2 {
      font-family: 'Playfair Display', serif;
      text-align: center;
      margin-bottom: 30px;
      font-size: 24px;
      font-weight: 600;
    }

    .sidebar ul {
      list-style: none;
      padding: 0;
    }

    .sidebar ul li {
      margin: 20px 0;
    }

    .sidebar ul li a {
      color: white;
      text-decoration: none;
      font-size: 18px;
      font-weight: 400;
      display: block;
      padding: 10px;
      border-radius: 4px;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .sidebar ul li a:hover {
      background-color: #3498db;
      color: white;
      transform: translateX(10px); /* Tạo hiệu ứng trượt sang phải khi hover */
    }

    /* Content khu vực chính */
    .content {
      flex-grow: 1;
      padding: 40px;
      background-color: #fff;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      overflow-y: auto;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }

    .header h1 {
      font-size: 28px;
      color: #333;
      font-weight: 600;
    }

    .header .user-info {
      font-size: 16px;
      color: #555;
    }

    /* Thẻ thông tin với màu loang */
    .cards {
      display: flex;
      gap: 20px;
      margin-bottom: 30px;
    }

    .card {
      background: linear-gradient(135deg, #3498db, #8e44ad);
      padding: 20px;
      width: 30%;
      border-radius: 8px;
      color: white;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
    }

    .card h3 {
      font-size: 20px;
      font-weight: 600;
    }

    .card p {
      font-size: 24px;
      font-weight: 400;
    }

    /* Bảng thông tin */
    .table-container {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .table-container h3 {
      font-size: 22px;
      margin-bottom: 20px;
      font-weight: 600;
      color: #333;
    }

    .table-container table {
      width: 100%;
      border-collapse: collapse;
    }

    .table-container th, .table-container td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: left;
    }

    .table-container th {
      background-color: #3498db;
      color: white;
    }

    .table-container tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .table-container tr:hover {
      background-color: #ecf0f1;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h2>ngocvystore</h2>
    <ul>
      <li><a href="<?php echo e(url('/dashboard')); ?>">Trang chủ</a></li>
      <li><a href="<?php echo e(url('/danh-sach-nguoi-dung')); ?>">User</a></li>
      <li><a href="<?php echo e(url('/danh-sach-danh-muc')); ?>">Category</a></li>
      <li><a href="<?php echo e(url('/danh-sach-san-pham')); ?>">Product</a></li>
      <li><a href="<?php echo e(url('/gio-hang')); ?>">Cart</a></li>
      <li><a href="<?php echo e(url('/hien-thi-san-pham')); ?>">Cửa Hàng</a></li>
      <li><a href="<?php echo e(url('/admin')); ?>">Web</a></li>
    </ul>
  </div>
  <!-- Content -->
  <div class="content" style="text-align: right;">
    <?php if(session('fullname')): ?>
          <a>Chào <?php echo e(session('fullname')); ?></a>
          <form action="<?php echo e(route('logout')); ?>" method="POST" style="display: inline;">
      <?php echo csrf_field(); ?>
              <button type="submit" class="" style="border: none; background: none;">
                / Logout
              </button>
          </form>
      <?php else: ?>
          <a href="<?php echo e(url('/dang-nhap')); ?>">Login</a>
      <?php endif; ?>
    <!-- Header -->
    <div class="header">
      <?php echo $__env->yieldContent('content'); ?>
      </div>
    </div>
    <!-- Các thẻ thông tin (cards) -->
    <!-- <div class="cards">
      <div class="card">
        <h3>Doanh thu</h3>
        <p>120,000 VND</p>
      </div>
      <div class="card">
        <h3>Lượt truy cập</h3>
        <p>5000</p>
      </div>
      <div class="card">
        <h3>Đơn hàng</h3>
        <p>150</p>
      </div>
    </div> -->

    <!-- Bảng thông tin -->
    <!-- <div class="table-container">
      <h3>Bảng thống kê</h3>
      <table>
        <thead>
          <tr>
            <th>Ngày</th>
            <th>Doanh thu</th>
            <th>Đơn hàng</th>
            <th>Lượt truy cập</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>01/11/2024</td>
            <td>10,000 VND</td>
            <td>20</td>
            <td>500</td>
          </tr>
          <tr>
            <td>02/11/2024</td>
            <td>15,000 VND</td>
            <td>30</td>
            <td>600</td>
          </tr>
          <tr>
            <td>03/11/2024</td>
            <td>12,000 VND</td>
            <td>25</td>
            <td>550</td>
          </tr>
          <tr>
            <td>04/11/2024</td>
            <td>13,000 VND</td>
            <td>28</td>
            <td>580</td>
          </tr>
        </tbody>
      </table>
    </div> -->
  </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel-tutorial\resources\views/dashboard.blade.php ENDPATH**/ ?>