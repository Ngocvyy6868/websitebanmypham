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
@extends('dashboard')

@section('content')
<body>
  <div class="container mt-4">
    <h1 class="text-center">DANH SÁCH NGƯỜI DÙNG</h1>
    <a href="them-user" class="btn">
      <img src="{{asset('img/add.png')}}" class="icon" alt=""> Thêm Người Dùng
    </a>
    
    <table class="table table-striped table-hover">
      <thead class="table-danger">
        <tr>
          <th class="table-dark">ID</th>
          <th>Tài Khoản</th>
          <th class="table-dark">Họ Tên</th>
          <th>Edit</th>
          <th class="table-dark">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{$user->ID}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->fullname}}</td>
            <td>
              <a href="thong-tin-user/{{$user->ID}}">
                <img src="{{asset('img/edit.png')}}" class="icon" alt="">
              </a>
            </td>
            <td>
              <a href="xoa-user/{{$user->ID}}">
                <img src="{{asset('img/delete.png')}}" class="icon" alt="">
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <!-- <h1 class="text-center">Giỏ Hàng (Cart)</h1>
    <table class="table table-striped table-hover">
      <thead class="table-danger">
        <tr>
          <th>ID</th>
          <th class="table-dark">Tài Khoản</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        // foreach($cart as $key => $value) {
          // $product = json_encode($value);
          // $product = json_decode($product);
        ?> 
          <tr>
            <td><?php  ?></td>
            <td><?php  ?></td>
          </tr>
        <?php  ?>
      </tbody> -->
    </table>
  </div>
</body>
</html>
@endsection