@extends('dashboard')

@section('content')
<body>
<div class="container mt-4">
    
    <h1 class="text-center">DANH SÁCH TẤT CẢ ĐƠN HÀNG</h1>

    @if($orders->isEmpty())
        <p>Không có đơn hàng nào.</p>
    @else
        <table class="table table-striped table-hover">
        <thead class="table-danger">
            <tr>
                <th>Mã đơn hàng</th>
                <th>Người dùng</th>
                <th>Trạng thái</th>
                <th>Tổng tiền</th>
                <th>Thanh toán</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->order_user }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ number_format($order->total_amount, 0, ',', ',') }},000 VND</td>
                    <td>{{ $order->payment }}</td>
                    <td>{{ $order->create_at }}</td>
                    <td>
                        <!-- Form to update the order status -->
                        <form action="{{ route('orders.updateStatus', $order->order_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" class="form-select" onchange="this.form.submit()">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    @endif
</div>
</body>
@endsection
