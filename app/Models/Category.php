<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public $translatable = ['category_name' ];

    protected $guarded  = [];

    public function User()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function Products()
    {
        return $this->hasMany(Product::class);
    }

    public function DriverRequests()
    {
        return $this->hasMany(DriverRequest::class , 'category_id');
    }

    public function SubCategories()
    {
        return $this->hasMany(SubCategory::class);

    }
    // public function Image() {
    //     return $this->morphOne(Image::class, 'imageable');
    // }
}
