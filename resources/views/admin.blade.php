<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap" rel="stylesheet">
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
        text-align: center;
        width: 250px;
        background: linear-gradient(135deg, #1b2a41, #4c4e84, #8e44ad, #4d6c91);
        color: white;
        padding: 20px;
        height: 100%;
        box-shadow: 4px 0 8px rgba(0, 0, 0, 0.1);
    }
    .sidebar a img{
        border-radius: 30%; /* Bo tròn ảnh */
        max-width: 150px;
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
        transform: translateX(10px);
        /* Tạo hiệu ứng trượt sang phải khi hover */
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

    .table-container th,
    .table-container td {
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
        <h2 style="">ngocvystore</h2>
        <a href="{{ url('/profile')}}"><img style="width:50%;" src="{{asset ('img/profile.jpg')}}" alt=""></a>
        <ul>
            <li><a href="{{ url('/danh-sach-nguoi-dung') }}">User</a></li>
            <li><a href="{{ url('/danh-sach-danh-muc') }}">Category</a></li>
            <li><a href="{{ url('/danh-sach-san-pham') }}">Product</a></li>
            <li><a href="{{ url('/danh-sach-dat-hang') }}">Order</a></li>
            <li><a href="{{ url('/danh-sach-lien-he') }}">Contact</a></li>
            <li><a href="{{ url('/trang-chu')}}">Cửa Hàng</li>
        </ul>
    </div>
    <!-- Content -->
    <div class="content" style="text-align: right;">
        @if (session('fullname'))
        <a>Chào {{ session('fullname') }}</a>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="" style="border: none; background: none;">
                / Logout
            </button>
        </form>
        @else
        <a href="{{ url('/dang-nhap') }}">Login</a>
        @endif
        <!-- Header -->
        <div class="header">
            @yield('content')
        </div>
    </div>

    </div>

</body>

</html>