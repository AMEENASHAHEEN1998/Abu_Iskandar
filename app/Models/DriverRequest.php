<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverRequest extends Model
{
    use HasFactory;

    protected $guarded  = [];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
    public function Category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }
    public function SubCategory()
    {
        return $this->belongsTo(SubCategory::class , 'subcategory_id');
    }
}
