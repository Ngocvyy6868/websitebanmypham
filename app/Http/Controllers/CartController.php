<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ReviewModel;
class CartController extends Controller
{
    // Phương thức hiển thị danh sách sản phẩm
    public function view()
    {
        // Lấy tất cả sản phẩm từ cơ sở dữ liệu
        $products = ProductModel::all();

        // Đếm số lượng sản phẩm trong giỏ hàng (nếu có)
        $cartCount = collect(session()->get('cart', []))->count();

        // Trả về view 'product_view' và truyền dữ liệu sản phẩm và số lượng giỏ hàng
        return view('trang_chu', compact('products', 'cartCount'));
    }
    public function index()
    {
        // Lấy tất cả sản phẩm từ cơ sở dữ liệu
        $products = ProductModel::all();

        // Đếm số lượng sản phẩm trong giỏ hàng (nếu có)
        $cartCount = collect(session()->get('cart', []))->count();

        // Trả về view 'product_view' và truyền dữ liệu sản phẩm và số lượng giỏ hàng
        return view('product_view', compact('products', 'cartCount'));
    }
    public function showProduct(Request $request, $id)
    {    
        $product = ProductModel::findOrFail($id);
    
        $relatedProducts = ProductModel::where('cate_ID', $product->cate_ID)
            ->where('product_ID', '!=', $id)
            ->take(4) 
            ->get();
    
        $reviews = ReviewModel::where('product_ID', $id)->get();

        return view('product_view_detail', compact('product', 'relatedProducts', 'reviews'));
    }
    
    // Phương thức để gửi đánh giá
    public function submitReview(Request $request, $productId)
    {
        if (!session()->has('ID')) {
            return redirect()->route('login')->with('error', 'Bạn phải đăng nhập để đánh giá sản phẩm');
        }
        // Validate dữ liệu gửi lên
        $request->validate([
            'rating' => 'required|integer|between:1,5',  // Rating từ 1 đến 5
            'comment' => 'required|string|max:1000',    // Bình luận không quá 1000 ký tự
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Kiểm tra ảnh hợp lệ
        ]);
    
        // Lưu ảnh nếu có
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('reviews', 'public');  // Lưu vào thư mục reviews trong public
        }
    
        // Tạo một đánh giá mới
        ReviewModel::create([
            'user_id' => session('ID'),
            'product_ID' => $productId,
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
            'image_path' => $imagePath,  // Lưu đường dẫn ảnh vào database
        ]);
    
        return redirect()->route('product.detail', ['id' => $productId])->with('success', 'Đánh giá của bạn đã được gửi!');
    }
    
    // Hiển thị giỏ hàng
    public function showCart()
    {
        $cart = session()->get('cart', []); // Lấy dữ liệu giỏ hàng từ session
        return view('cart', compact('cart'));
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart($id)
    {
        $product = ProductModel::where('product_ID', $id)->first();
    
        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại!');
        }
    
        $cart = session()->get('cart', []);
    
        // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng chưa
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'product_ID' => $product->product_ID,
                'name' => $product->product_name,
                'quantity' => 1,
                'price' => $product->product_price,
                'image' => $product->product_img,
            ];
        }
    
        session()->put('cart', $cart);
        // Thêm thông báo toastr vào session
        session()->flash('success', 'Sản phẩm đã được thêm vào giỏ hàng thành công!');
    
        // Quay lại trang trước và hiển thị thông báo
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }
    
    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart); // Cập nhật lại session
        }

        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
    }
    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);
    
        foreach ($request->quantities as $id => $quantity) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = max(1, (int)$quantity); // Đảm bảo số lượng ít nhất là 1
            }
        }
    
        session()->put('cart', $cart);
    
        return redirect()->back()->with('success', 'Giỏ hàng đã được cập nhật!');
    }
}