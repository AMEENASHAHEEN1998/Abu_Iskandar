<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverRequest extends Model
{
    use HasFactory;

    protected $fillable=['user_id','product_id','price','size','number','status'];
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
        return $this->belongsTo(Category::class);
    }
    public function Subcategory()
    {
        return $this->belongsTo(SubCategory::class , 'subcategory_id');
    }
}
