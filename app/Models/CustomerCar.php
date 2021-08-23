<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCar extends Model
{
    use HasFactory;

    public function Car()
    {
        return $this->belongsTo(Car::class , 'car_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function Customer()
    {
        return $this->hasMany(Customer::class , 'customer_id' );
    }
}
