<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    // Explicitly set the table name
    protected $table = 'category';  // The name of your table in MySQL
    protected $primaryKey = 'category_ID';
    public $timestamps=false;
}
