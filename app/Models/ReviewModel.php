<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewModel extends Model
{
    protected $table = 'reviews';

    protected $fillable = [
        'user_id',
        'product_ID',
        'rating',
        'comment',
        'image_path',  // Thêm thuộc tính image_path vào fillable
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_ID');
    }
}
