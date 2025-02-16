<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', function () {
    return redirect()->to('/trang-chu');
}); // Trang cần đăng nhập


// // login
// Route::get('list-user', [\App\Http\Controllers\StudViewController::class, 'list']);
// Route::get('login-user', [\App\Http\Controllers\StudViewController::class, 'login']);
// Route::get('laydulieu',  [\App\Http\Controllers\StudViewController::class, 'list']);
// Route::get('list-stu',[\App\Http\Controllers\StudViewController::class, 'index']);


//dashboard
Route::get('dashboard', [\App\Http\Controllers\StudViewController::class, 'dashboard']);
Route::get('admin', [\App\Http\Controllers\StudViewController::class, 'admin'])->name('admin');


// Route cho trang đăng nhập
Route::get('dang-nhap', [App\Http\Controllers\StudViewController::class, 'showLoginForm'])->name('login');
Route::get('them-dang-ky', [App\Http\Controllers\StudViewController::class, 'add']);
Route::post('dang-ky', [App\Http\Controllers\StudViewController::class, 'save']);
Route::post('logout', [App\Http\Controllers\StudViewController::class, 'logout'])->name('logout');
Route::post('/act_login', [App\Http\Controllers\StudViewController::class, 'login'])->name('act_login');

// Route cho form thay đổi mật khẩu
Route::get('/change-password', [App\Http\Controllers\UserController::class, 'showChangePasswordForm'])->name('change-password.form');
// Route xử lý việc thay đổi mật khẩu (POST)
Route::post('/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('change-password');

//người dùng
Route::get('session',function(Request $request){
    $request->session()->put("cart.product", [['id' => 123, 'item' => 5]]);
    $request->session()->push("cart.product",['id' => 'ABC', 'item' => 7]);
    return redirect()->to('dashboard');
});

Route::get('danh-sach-nguoi-dung',[App\http\Controllers\UserController::class,'list']);
Route::get('thong-tin-user/{ID}',[App\http\Controllers\UserController::class,'show']);
Route::post('cap-nhat-nguoi-dung',[App\http\Controllers\UserController::class,'update']);
Route::get('xoa-user/{ID}',[App\http\Controllers\UserController::class,'delete']);
Route::get('them-user',[App\http\Controllers\UserController::class,'add']);
Route::post('them-user',[App\http\Controllers\UserController::class,'save']);
Route::match(['post','get'],'greeting/{ID?}',function($ID=null){
    if(isset($ID))
    return "hello $ID";
    return "ASD";
});


//danh mục
Route::get('danh-sach-danh-muc',[App\http\Controllers\CategoryController::class,'list']);
Route::get('thong-tin-danh-muc/{ID}',[App\http\Controllers\CategoryController::class,'show']);
Route::post('cap-nhat-danh-muc',[App\http\Controllers\CategoryController::class,'update']);
Route::get('xoa-danh-muc/{ID}',[App\http\Controllers\CategoryController::class,'delete']);
Route::get('them-danh-muc',[App\http\Controllers\CategoryController::class,'add']);
Route::post('them-danh-muc',[App\http\Controllers\CategoryController::class,'save']);


//san pham
Route::get('danh-sach-san-pham',[App\http\Controllers\ProductController::class,'list']);
Route::get('thong-tin-san-pham/{ID}',[App\http\Controllers\ProductController::class,'show']);
Route::post('cap-nhat-san-pham',[App\http\Controllers\ProductController::class,'update']);
Route::get('xoa-san-pham/{ID}',[App\http\Controllers\ProductController::class,'delete']);
Route::get('them-san-pham',[App\http\Controllers\ProductController::class,'add']);
Route::post('them-san-pham',[App\http\Controllers\ProductController::class,'save']);

//lien he
Route::get('lien-he',[App\http\Controllers\ContactController::class,'view']);
Route::post('luu-contact',[App\http\Controllers\ContactController::class,'save']);
Route::get('danh-sach-lien-he',[App\http\Controllers\ContactController::class,'list']);
Route::get('xoa-contact/{ID}',[App\http\Controllers\ContactController::class,'delete']);



//hien thi web
Route::get('trang-chu',[App\http\Controllers\CartController::class,'view']);

// Route cho trang danh sách sản phẩm
Route::get('hien-thi-san-pham', [App\Http\Controllers\CartController::class, 'index'])->name('product.index');
Route::get('/product/{id}', [App\Http\Controllers\CartController::class, 'showProduct'])->name('product.detail');
//danh gia san pham
Route::post('/product/{id}/submit-review', [App\Http\Controllers\CartController::class, 'submitReview'])->name('product.submitReview');

Route::get('add-to-cart/{id}', [App\http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
Route::get('cart', [App\http\Controllers\CartController::class, 'showCart'])->name('cart.index');
Route::get('cart/remove/{id}', [App\http\Controllers\CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/update', [App\http\Controllers\CartController::class, 'updateCart'])->name('cart.update');

//checkoutcheckout
Route::get('/checkout', [App\Http\Controllers\OrderController::class, 'checkout'])->name('checkout');
Route::post('gio-hang', [App\Http\Controllers\OrderController::class, 'store']);
Route::get('/order/complete/{order}', [App\http\Controllers\OrderController::class, 'complete'])->name('order.complete');
Route::get('/product-view/{order}', [App\http\Controllers\OrderController::class, 'index'])->name('product.view');

Route::put('/orders/{id}/update-status', [App\http\Controllers\OrderController::class, 'updateStatus'])->name('orders.updateStatus');
Route::get('danh-sach-da-dat-hang', [App\http\Controllers\OrderController::class, 'getOrders']);

Route::get('danh-sach-dat-hang', [App\http\Controllers\OrderController::class, 'list']);

// Route xem chi tiết đơn hàng
Route::get('/order/{id}', [App\http\Controllers\OrderController::class, 'showOrderDetail'])->name('order.show');
// Route hiển thị danh sách đơn hàng
Route::get('/orders', [App\http\Controllers\OrderController::class, 'list'])->name('order.list');
// Route::get('/order/success/{order_id}', [App\http\Controllers\OrderController::class, 'showOrderSuccess'])->name('order.success');

Route::get('profile', [App\http\Controllers\ProfileController::class, 'showProfile'])->name('profile');
Route::get('profile/edit', [App\http\Controllers\ProfileController::class, 'editProfile'])->name('profile.edit');
Route::post('profile/update', [App\http\Controllers\ProfileController::class, 'updateProfile'])->name('profile.update');
