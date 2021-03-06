<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    public function Neighborhoods()
    {
        return $this->hasMany(Neighborhood::class , 'city_id');
    }

    public function Customer()
    {
        return $this->belongsTo(Customer::class , 'city_id');
    }

    public function Distributor()
    {
        return $this->hasMany(Distributor::class , 'city_id');
    }
}
