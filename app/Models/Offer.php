<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    use HasFactory;
    protected $fillable =['user_id' ,'description_en' ,'offer_title_en','description_ar' ,'offer_title_ar','price','status','status_value','image'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Image() {
        return $this->morphOne(Image::class, 'imageable');
    }


}
