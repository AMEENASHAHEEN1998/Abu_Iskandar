<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;

    protected $fillable=['name_en','name_ar','place','distributor_type_id','phone_number', 'user_id' ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function DistributorType(){
        return $this->belongsTo(DistributorType::class,'distributor_type_id');
    }

    public function City(){
        return $this->belongsTo(City::class,'city_id');
    }
}
