<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa Hồ Sơ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 26px;
            margin-bottom: 30px;
        }

        .container {
            max-width: 800px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin: auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            color: #555;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        .form-group textarea {
            resize: vertical;
            height: 120px;
        }

        .form-group input[type="file"] {
            padding: 5px;
        }

        .form-group img {
            margin-top: 15px;
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 16px;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Chỉnh sửa hồ sơ người dùng</h2>
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="fullname">Họ và tên:</label>
                <input type="text" name="fullname" value="{{ $profile->fullname }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" value="{{ $profile->email }}" required>
            </div>

            <div class="form-group">
                <label for="birthday">Ngày sinh:</label>
                <input type="date" name="birthday" value="{{ $profile->birthday }}">
            </div>

            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="text" name="phone" value="{{ $profile->phone }}">
            </div>

            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <textarea name="address">{{ $profile->address }}</textarea>
            </div>

            <div class="form-group">
                <label for="img">Ảnh đại diện:</label>
                <input type="file" name="img">
                @if ($profile->img)
                    <img src="{{ asset($profile->img) }}" alt="Avatar">
                @endif
            </div>

            <div class="form-group">
                <label for="bio">Tiểu Sử:</label>
                <input type="text" name="bio" value="{{ $profile->bio }}">
            </div>

            <button type="submit">Cập nhật</button>
        </form>

        <a href="{{ route('product.index') }}">Quay lại trang sản phẩm</a>
    </div>
</body>
</html>
