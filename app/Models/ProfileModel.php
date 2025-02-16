<?php
namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use HasFactory;

class ProfileModel extends Model
{
    // Bảng tương ứng trong cơ sở dữ liệu
    protected $table = 'profile'; // Nếu bạn có bảng profile, còn nếu không thì dùng bảng user.

    // Các cột có thể được gán giá trị (mass assignable)
    protected $fillable = [
        'user_id', 'fullname', 'phone', 'address','img', 'bio', 'email', 'birthday','updated_at','updated_at'
    ];
    public $timestamps = true;  
    // Khai báo mối quan hệ với bảng user (nếu có)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}