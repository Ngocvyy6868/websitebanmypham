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
    <h1 class="text-center">DANH SÁCH SẢN PHẨM</h1>
    <a href="them-san-pham" class="btn">
      <img src="{{asset('img/add.png')}}" class="icon" alt=""> Thêm Sản Phẩm
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
      
        @foreach($items as $item)
          <tr>
            <td>{{$item->product_ID}}</td>
            <td>{{$item->product_name}}</td>
            <td>{{$item->cate_name}}</td>
            <td><img src="{{asset($item->product_img)}}" width="100" alt=""></td>
            <td>{{$item->product_des}}</td>
            <td>{{$item->product_quantity}}</td>
            <td>{{$item->product_price}}</td>
            <td>
              <a href="thong-tin-san-pham/{{$item->product_ID}}">
                <img src="{{asset('img/edit.png')}}" class="icon" alt="">
              </a>
            </td>
            <td>
              <a href="xoa-san-pham/{{$item->product_ID}}">
                <img src="{{asset('img/delete.png')}}" class="icon" alt="">
              </a>
            </td>
          </tr>
        @endforeach
     
    </table>
  </div>
</body>
</html>
@endsection