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
    <h1 class="text-center">DANH SÁCH DANH MỤC</h1>
    <a href="them-danh-muc" class="btn">
      <img src="{{asset('img/add.png')}}" class="icon" alt=""> Thêm Danh Mục
    </a>
    
    <table class="table table-striped table-hover">
      <thead class="table-danger">
        <tr>
          <th>Mã Danh Mục</th>
          <th>Tên Danh Mục</th>
          <th>Mô Tả Danh Mục</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      
        @foreach($items as $item)
          <tr>
            <td>{{$item->cate_ID}}</td>
            <td>{{$item->cate_name}}</td>
            <td>{{$item->cate_des}}</td>
            <td>
              <a href="thong-tin-danh-muc/{{$item->cate_ID}}">
                <img src="{{asset('img/edit.png')}}" class="icon" alt="">
              </a>
            </td>
            <td>
              <a href="xoa-danh-muc/{{$item->cate_ID}}">
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