<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCar extends Model
{
    use HasFactory;
    protected $table = 'customerscars';
    protected $guarded =[];

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
        return $this->belongsTo(Customer::class , 'customer_id' );
    }
}
