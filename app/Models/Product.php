<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function User()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function DriversRequests()
    {
        return $this->belongsToMany(DriverRequest::class);
    }

    public function Image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}
