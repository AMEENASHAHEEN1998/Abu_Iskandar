<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Categories()
    {
        return $this->hasMany(Category::class );
    }

    public function SubCategories()
    {
        return $this->hasMany(SubCategory::class );
    }

    public function Products()
    {
        return $this->hasMany(Product::class );
    }

    public function Offers()
    {
        return $this->hasMany(Offer::class );
    }

    public function Article()
    {
        return $this->hasMany(Article::class );
    }

    public function RequestJob()
    {
        return $this->hasOne(RequestJob::class );
    }

    public function Jobs()
    {
        return $this->hasMany(Job::class );
    }

    public function Information()
    {
        return $this->hasMany(Information::class );
    }

    public function Employees()
    {
        return $this->hasMany(Employee::class );
    }

    public function Distributors()
    {
        return $this->hasMany(Distributor::class );
    }

    public function DistributorsType()
    {
        return $this->hasMany(DistributorType::class );
    }

    public function DriverRequests()
    {
        return $this->hasMany(DriverRequest::class );
    }
    public function Image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}