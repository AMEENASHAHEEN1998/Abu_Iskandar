<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    use HasFactory;

    public function Neighborhood()
    {
        return $this->belongsTo(Neighborhood::class , 'id_neighborhood');
    }

    public function Customer()
    {
        return $this->belongsTo(Customer::class , 'street_id');
    }
}
