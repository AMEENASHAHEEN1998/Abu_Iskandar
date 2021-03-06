<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded  = [];

    public function User()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function SubCategories()
    {
        return $this->hasMany(SubCategory::class , 'subcategory_id');
    }

    public function DriverRequests()
    {
        return $this->hasMany(DriverRequest::class);
    }

    public function Prices()
    {
        return $this->hasMany(price::class);
    }

    public function Image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}
