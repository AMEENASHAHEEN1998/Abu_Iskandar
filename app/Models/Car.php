<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function CustomersCars()
    {
        return $this->hasMany(CustomerCar::class , 'car_id');
    }
}
