<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class OderDetailModel extends Model
{
    use HasFactory;

    // Định nghĩa bảng
    protected $table = 'order_details';

    // Các cột có thể được gán đại diện (fillable)
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    // Mối quan hệ với model Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_ID');
    }

    // Mối quan hệ với model Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}