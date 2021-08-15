<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestJob extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'specialization',
        'university',
        'comments_user',
        'phone_number',
        'address',
        'status',
        'status_value',
        'personal_image',
        // 'certificate_photo',
        'comments_admin',
        'comments_user',
        'start_date',
        'Date_of_Birth',
        'job_id',
        'user_id'
    ];

//
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function job(){
        return $this->belongsTo(Job::class,'job_id');
    }
}
