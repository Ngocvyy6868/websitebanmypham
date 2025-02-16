<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh Sách LIÊN HỆ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>
@extends('dashboard')

@section('content')

<body>
    <div class="container mt-4">
        <h1 class="text-center">DANH SÁCH LIÊN HỆ</h1>
        <!-- <a href="them-user" class="btn">
      <img src="{{asset('img/add.png')}}" class="icon" alt=""> Thêm Người Dùng
    </a> -->

        <table class="table table-striped table-hover">
            <thead class="table-danger">
                <tr>
                    <th class="table-dark">ID</th>
                    <th>Họ Tên</th>
                    <th class="table-dark">Số Điện Thoại</th>
                    <th>Email</th>
                    <th class="table-dark">Lời Nhắn</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr>
                    <td>{{$contact->contact_ID}}</td>
                    <td>{{$contact->contact_name}}</td>
                    <td>{{$contact->contact_phone}}</td>
                    <td>{{$contact->contact_email}}</td>
                    <td>{{$contact->contact_message}}</td>
                    <td>
                        <!-- Chỉnh sửa liên kết xóa -->
                        <a href="xoa-contact/{{$contact->contact_ID}}">
                            <img src="{{asset('img/delete.png')}}" class="icon" alt="">
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</body>

</html>
@endsection