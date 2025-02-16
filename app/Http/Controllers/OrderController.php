<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\OrderModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class OrderController extends Controller
{
    // Hiển thị trang checkout
    public function checkout()
    {
        return view('checkout');
    } 
    public function store(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!session('username')) {
            return redirect()->route('login')->withErrors(['login_error' => 'Vui lòng đăng nhập để thực hiện thanh toán.']);
        }
    
        // Lấy thông tin người dùng từ bảng user thông qua session username
        $user = DB::table('user')->where('username', session('username'))->first();
    
        // Kiểm tra xem người dùng có tồn tại không
        if (!$user) {
            return redirect()->route('login')->withErrors(['login_error' => 'Người dùng không tồn tại.']);
        }
    
        // Gán user_id từ bảng user
        $user_id = $user->ID;
    
        // Lấy thông tin giỏ hàng từ session
        $cart = session('cart', []);
    
        // Kiểm tra xem giỏ hàng có rỗng không
        if (empty($cart)) {
            return redirect()->route('cart.index')->withErrors(['cart_empty' => 'Giỏ hàng của bạn đang trống.']);
        }
    
        // Tính tổng tiền và kiểm tra dữ liệu trong giỏ hàng
        $totalAmount = 0;
        foreach ($cart as $item) {
            // Kiểm tra xem sản phẩm có khóa 'product_ID' hay không
            if (!isset($item['product_ID'])) {
                return redirect()->route('cart.index')->withErrors(['cart_error' => 'Sản phẩm không hợp lệ trong giỏ hàng.']);
            }
            
            // Cộng tổng tiền
            $totalAmount += $item['price'] * $item['quantity'];
        }
    
        // Lưu đơn hàng vào bảng `order`
        $order = DB::table('order')->insertGetId([
            'user_id' => $user_id,
            'payment' => $request->payment,
            'shipping' => 'processing',  // Trạng thái mặc định
            'status' => 'pending',       // Trạng thái đơn hàng
            'note' => $request->note,
            'order_user' => $request->name,
            'phone' => $request->phone ?? '',
            'create_at' => Carbon::now(), // Thời gian hiện tại
            'total_amount' => $totalAmount,
            'address' => $request->address ?? '',
        ]);
    
        // Lưu thông tin chi tiết đơn hàng vào bảng `order_details`
        foreach ($cart as $item) {
            DB::table('order_details')->insert([
                'order_id' => $order, // order_id là ID của đơn hàng vừa được tạo
                'product_ID' => $item['product_ID'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }
    
        // Xóa giỏ hàng trong session
        session()->forget('cart');
    
        // Sau khi tạo đơn hàng thành công, chuyển hướng với tham số order_id
        return redirect()->to('hien-thi-san-pham');
    }
    public function updateStatus(Request $request, $id)
    {
        // Validate the status input (ensure the status is one of the allowed values)
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled', // Allowed statuses
        ]);

        // Find the order by ID
        $order = DB::table('order')->where('order_id', $id)->first();

        // Check if the order exists
        if (!$order) {
            return redirect()->back()->withErrors(['order_not_found' => 'Đơn hàng không tồn tại.']);
        }

        // Update the order status in the database
        DB::table('order')->where('order_id', $id)->update([
            'status' => $request->input('status'),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Trạng thái đơn hàng đã được cập nhật!');
    }

    // public function showOrderSuccess($order_id)
    // {
    //     // Lấy thông tin đơn hàng từ database bằng order_id
    //     $order = OrderModel::find($order_id);
    
    //     // Nếu không tìm thấy đơn hàng, hiển thị lỗi
    //     if (!$order) {
    //         return redirect()->route('cart.index')->withErrors(['order_not_found' => 'Đơn hàng không tồn tại.']);
    //     }
    
    //     // Trả về view thành công với thông tin đơn hàng
    //     return view('order.success', compact('order'));
    // }
    

    // Lấy danh sách đơn hàng của người dùng
    public function getOrders()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!session('username')) {
            return redirect()->route('login')->withErrors(['login_error' => 'Vui lòng đăng nhập để xem đơn hàng của bạn.']);
        }

        // Lấy thông tin người dùng từ bảng user thông qua session username
        $user = DB::table('user')->where('username', session('username'))->first();

        // Kiểm tra xem người dùng có tồn tại không
        if (!$user) {
            return redirect()->route('login')->withErrors(['login_error' => 'Người dùng không tồn tại.']);
        }

        // Lấy danh sách đơn hàng của người dùng từ bảng order
        $order = DB::table('order')
                    ->where('user_id', $user->ID)
                    ->orderBy('create_at', 'desc')  // Sắp xếp theo thời gian tạo đơn hàng
                    ->get();

        // Truyền dữ liệu đơn hàng vào view
        return view('order_complete', ['orders' => $order]);
    }
    public function list(Request $request)
    {
        $orders = OrderModel::all(); // Lấy tất cả các bản ghi
        return view('order_list', ['orders' => $orders]); // Đảm bảo biến là 'orders'
    }
    public function showOrderDetail($id)
    {
        // Lấy thông tin đơn hàng theo order_id từ bảng 'order'
        $order = DB::table('order')->where('order_id', $id)->first();
    
        // Kiểm tra nếu đơn hàng không tồn tại
        if (!$order) {
            return redirect()->route('order.list')->withErrors(['order_not_found' => 'Đơn hàng không tồn tại.']);
        }
    
        // Lấy thông tin chi tiết đơn hàng từ bảng 'order_details' và bảng 'product'
        $orderDetails = DB::table('order_details')
            ->join('product', 'order_details.product_ID', '=', 'product.product_ID')
            ->where('order_details.order_id', $id)
            ->select(
                'order_details.*',
                'product.product_name as product_name',
                'product.product_price as product_price'
            )
            ->get(); // Lấy tất cả chi tiết sản phẩm trong đơn hàng
    
        // Lấy thông tin người dùng (người đã đặt đơn) từ bảng 'user'
        $user = DB::table('user')->where('ID', $order->user_id)->first();
    
        // Trả về view 'order_show' với thông tin đơn hàng, chi tiết đơn hàng và người dùng
        return view('order_show', [
            'order' => $order,
            'orderDetails' => $orderDetails,
            'user' => $user,
        ]);
    }
    
    
}
