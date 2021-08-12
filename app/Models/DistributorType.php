<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributorType extends Model
{
    use HasFactory;
    protected $fillable=['name_ar','name_en','user_id'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Distributor(){
        return $this->hasOne(Distributor::class,'distributor_type_id');
    }
}
