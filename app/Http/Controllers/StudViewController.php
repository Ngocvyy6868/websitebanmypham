<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use DB;
use Illuminate\Support\Facades\Hash;  // Add this import statement
class StudViewController extends Controller
{
    public function dashboard()
    {
        return view('admin');
    }

    public function admin(){
        return view('admin');
        // print_r($users);
    }
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('login'); 
    }
    public function add(){
        return view("register");
    }
//  public function save(Request $request){
    //     $name = $request->input("txt_username");
    //     $fullname = $request->input("txt_fullname");
    //     $password = $request->input("txt_password");
    //     UserModel::insert(['username'=>$name,'fullname'=>$fullname, 'password'=>$password]);
    //     //CategoryModel::insert(['cate_name'=>$name,'cate_des'=>$description]);

    //     return view("login");
// }

    // Đăng nhập
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
    
        // Lấy thông tin người dùng từ cơ sở dữ liệu
        $user = UserModel::where('username', $username)->first();
    
        if ($user && $user->password === $password) {
            // Lưu thông tin người dùng vào session
            session(['ID' => $user->ID]);
            session(['username' => $user->username]);
            session(['fullname' => $user->fullname]);
            session(['role' => $user->role]); // Lưu quyền của người dùng vào session

            // Kiểm tra và chuyển hướng người dùng dựa trên vai trò
        // Chuyển hướng theo vai trò
        if ($user->role == 1) {
            // Nếu là admin, chuyển đến trang quản lý admin
            return redirect()->route('admin')->with('success', 'Đăng nhập thành công');
        } else {
            // Nếu là user, chuyển đến trang hiển thị sản phẩm
            return redirect()->to('trang-chu')->with('success', 'Đăng nhập thành công');
        }
        } else {
        // Nếu thông tin đăng nhập không hợp lệ
        return redirect()->route('login')->withErrors(['login_error' => 'Thông tin đăng nhập không đúng.']);
        }
    }

    // Lưu người dùng mới
        // Lưu người dùng mới (không mã hóa mật khẩu)
        public function save(Request $request)
        {
            $name = $request->input("txt_username");
            $fullname = $request->input("txt_fullname");
            $password = $request->input("txt_password");

            // Lưu thông tin người dùng vào cơ sở dữ liệu mà không mã hóa mật khẩu
            UserModel::insert([
                'username' => $name, 
                'fullname' => $fullname, 
                'password' => $password, // Mật khẩu lưu dưới dạng thuần túy
                'role' => 0  // Đăng ký role mặc định là 0
            ]);

            return redirect()->to('dang-nhap')->with('success', 'Đăng ký thành công!');
        }

    public function logout(Request $request)
    {
        // Forget the session data
        $request->session()->forget('ID');
        $request->session()->forget('username');
        $request->session()->forget('fullname');
        $request->session()->forget('role');
    
        // Redirect with success message
        // return redirect()->to(url()->previous() ?: route('product.index'))->with('success', 'Đăng Xuất Thành Công');
        return  redirect()->to('hien-thi-san-pham')->with('success', 'Đăng Xuất Thành Công');
    }
}
