<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable =['article_name_ar','article_name_en','description_ar','description_en','views','content_en','content_ar','status','status_value','user_id'];
    

    public function Image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
