<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function Note()
    {
        return $this->hasOne(Note::class , 'customer_id');
    }

    public function ClassModel()
    {
        return $this->hasOne(ClassModel::class , 'class_id');
    }

    public function City()
    {
        return $this->hasOne(City::class , 'city_id');
    }

    public function Neighborhood()
    {
        return $this->hasOne(Neighborhood::class , 'id_neighborhood');
    }

    public function Street()
    {
        return $this->hasOne(Street::class , 'street_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
    public function CustomerCar()
    {
        return $this->hasMany(CustomerCar::class , 'customer_id');
    }
}
