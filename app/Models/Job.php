<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable=['job_name_ar','job_name_en','job_description_ar','job_description_en','status','image','status_value','views','user_id','job_declaration'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function RequestJob(){
        return $this->belongsTo(RequestJob::class ,'job_id');
    }

    public function Image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}
