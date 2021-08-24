<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    use HasFactory;
    protected $fillable=['name','city_id'];

    public function City()
    {
        return $this->belongsTo(City::class, 'city_id' );
    }

    public function Streets()
    {
        return $this->hasMany(Street::class, 'id_neighborhood' );
    }

    public function Customer()
    {
        return $this->belongsTo(Customer::class , 'id_neighborhood');
    }
}
