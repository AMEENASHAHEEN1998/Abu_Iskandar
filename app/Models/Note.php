<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function Customer()
    {
        return $this->belongsTo(Customer::class , 'customer_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class , 'user_id');
    }


}
