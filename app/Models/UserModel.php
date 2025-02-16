<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user';  // Tên bảng trong cơ sở dữ liệu
    // protected $primaryKey = 'id'; // Khóa chính của bảng
    public $timestamps = false;    // Laravel sẽ tự động quản lý timestamps (created_at, updated_at)
    // protected $fillable = ['username', 'fullname', 'password'];  // Các trường có thể điền vào cơ sở dữ liệu
    // Khai báo mối quan hệ với bảng reviews
    public function reviews()
    {
        return $this->hasMany(ReviewModel::class, 'user_id');  // 'user_id' trỏ tới bảng reviews
    }
}
