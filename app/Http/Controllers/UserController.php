<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\CategoryModel;
use DB; 

class UserController extends Controller
{
    // Hiển thị form thay đổi mật khẩu
    public function showChangePasswordForm()
    {
        return view('change-password'); // Create a new view for password change
    }
    public function changePassword(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!session()->has('ID')) {
            return redirect()->route('login')->withErrors(['error' => 'Vui lòng đăng nhập để thay đổi mật khẩu']);
        }
    
        // Lấy ID người dùng từ session
        $userId = session('ID');
        $user = UserModel::find($userId);
    
        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Người dùng không tồn tại']);
        }
    
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:5|confirmed', // Mật khẩu mới phải xác nhận
        ]);
    
        // Kiểm tra mật khẩu cũ
        if ($request->input('old_password') !== $user->password) {
            return redirect()->route('change-password.form')->withErrors(['old_password' => 'Mật khẩu cũ không chính xác']);
        }
    
        // Cập nhật mật khẩu mới
        $user->password = $request->input('new_password');
        $user->save();
    
        return redirect()->route('product.index')->with('success', 'Mật khẩu đã được thay đổi thành công');
    }
    
    public function list(Request $request){
        $users = UserModel::all();
        return view('list_user',['users'=>$users]);
        // print_r($users);
    }
    public function show($ID){
        $user = UserModel::where('ID',$ID)->get();
        return view('info_user',['user'=>$user]);
    }
    public function delete($ID){
        $rs = UserModel::where('ID',$ID)->delete();
        return redirect()->to('/danh-sach-nguoi-dung');
    }
    public function update(Request $request)
    {
        $ID = $request->input("txt_id");
        $name = $request->input("txt_username");
        $fullname = $request->input("txt_fullname");
        UserModel::where('ID', $ID)->update(['username' => $name,'fullname' => $fullname ]);
    
        return redirect()->to('/danh-sach-nguoi-dung');
    }
        public function add(){
        return view("add_user");
    }
    public function save(Request $request){
        $name = $request->input("txt_username");
        $fullname = $request->input("txt_fullname");
        $password = $request->input("txt_password");
        UserModel::insert(['username'=>$name,'fullname'=>$fullname, 'password'=>$password]);
        //CategoryModel::insert(['cate_name'=>$name,'cate_des'=>$description]);

        return redirect()->to('danh-sach-nguoi-dung');
    }
}
