<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\ProfileModel;
use Illuminate\Http\Request;

class ProfileController  extends Controller
{
    // Hiển thị thông tin hồ sơ người dùng
    public function showProfile()
    {
        $userId = session('ID');

        if (!$userId) {
            return redirect()->route('login')->withErrors(['login_error' => 'Vui lòng đăng nhập.']);
        }

        $profile = ProfileModel::where('user_id', $userId)->first();

        if (!$profile) {
            return redirect()->route('login')->withErrors(['profile_not_found' => 'Không tìm thấy hồ sơ người dùng.']);
        }

        return view('profile', compact('profile'));
    }

    // Hiển thị form chỉnh sửa hồ sơ
    public function editProfile()
    {
        // Lấy thông tin hồ sơ người dùng từ bảng 'profile' theo 'user_id' từ session
        $profile = ProfileModel::where('user_id', session('ID'))->first();
        
        if (!$profile) {
            return redirect()->route('profile.edit')->withErrors(['profile_not_found' => 'Không tìm thấy hồ sơ người dùng.']);
        }

        return view('profile_edit', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        // Validate thông tin nhập vào
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'birthday' => 'nullable|date',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra ảnh
            'bio' => 'nullable|string',
        ]);
        
        // Lấy thông tin hồ sơ
        $profile = ProfileModel::where('user_id', session('ID'))->first();
    
        if (!$profile) {
            return redirect()->route('profile.edit')->withErrors(['profile_not_found' => 'Không tìm thấy hồ sơ người dùng.']);
        }
    
        // Kiểm tra nếu có ảnh mới thì tải lên
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            // Xóa ảnh cũ nếu có
            if ($profile->img && file_exists(public_path($profile->img))) {
                unlink(public_path($profile->img));
            }
    
            // Lấy ảnh mới
            $image = $request->file('img');
            
            // Tạo tên duy nhất cho ảnh
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            // Di chuyển ảnh vào thư mục 'public/images'
            $image->move(public_path('images'), $imageName);
            
            // Lưu đường dẫn ảnh vào cơ sở dữ liệu
            $img = 'images/' . $imageName;
        } else {
            // Nếu không có ảnh mới, giữ lại ảnh cũ
            $img = $profile->img;
        }
    
        // Cập nhật hồ sơ
        $profile->update([
            'fullname' => $validatedData['fullname'],
            'email' => $validatedData['email'],
            'birthday' => $validatedData['birthday'],
            'phone' => $validatedData['phone'],
            'updated_at' => Carbon::now(),
            'address' => $validatedData['address'],
            'img' => $img, // Lưu ảnh vào cơ sở dữ liệu
            'bio' => $validatedData['bio'],
        ]);
    
        // Chuyển hướng về trang sản phẩm sau khi cập nhật
        return redirect()->route('product.index')->with('success', 'Cập nhật hồ sơ thành công');
    }
    
    
}
