<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    protected $table = 'contact';  // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'contact_ID'; // Nếu cột primary key khác 'id'
    public $timestamps = false;    // Laravel sẽ tự động quản lý timestamps (created_at, updated_at)
    protected $fillable = ['contact_name', 'contact_phone', 'contact_email', 'contact_message'];  // Các trường có thể điền vào cơ sở dữ liệu
}
