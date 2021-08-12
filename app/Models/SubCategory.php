<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $guarded  = [];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function Products()
    {
        return $this->hasMany(Product::class);
    }
}
