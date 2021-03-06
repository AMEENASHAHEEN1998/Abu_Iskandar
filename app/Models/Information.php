<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $guarded  = [];
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}
