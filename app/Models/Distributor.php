<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;

    protected $fillable=['name_en','name_ar', 'distributor_name_ar','distributor_name_en','distributor_type_id','phone_number', 'user_id' ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function DistributorType(){
        return $this->belongsTo(DistributorType::class,'distributor_type_id');
    }
}
