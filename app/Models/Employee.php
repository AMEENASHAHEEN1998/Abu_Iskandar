<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable  =['employee_name_ar','employee_name_en','job_title_ar','job_title_en','image','status','status_value'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}
