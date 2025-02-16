<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = 'order';  // Đảm bảo bảng là 'order'
    protected $primaryKey = 'order_id';  // Nếu khóa chính không phải là 'id'
    protected $fillable = ['user_id', 'payment', 'shipping', 'status', 'note', 'order_user', 'phone', 'create_at', 'total_amount', 'address'];
    public $timestamps=false;
//  // Quan hệ với order_items
//  public function orderItems()
//  {
//      return $this->hasMany(OrderItemModel::class, 'order_id' );
//  }
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
    // Mối quan hệ với OrderDetailModel
    public function details()
    {
        return $this->hasMany(OrderDetailModel::class, 'order_id', 'order_id');
    }
}
