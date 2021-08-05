<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function Image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
