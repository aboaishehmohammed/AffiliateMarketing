<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable ,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birthdate',
        'phone',
        'role',
        'referral_link',
        'views'
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

    public function image()
    {
        return $this->morphOne(Image::class, 'Imagable');
    }

    public function getProfileImageAttribute()
    {
        return $this->image ? 'storage/'.$this->image->path :'';
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class)->withDefault();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class , 'category_user');
    }

    public function scopeNotAdmin($query)
    {
        return $query->where('role', 0);
    }

    public function referralUsers()
    {
        return $this->hasMany(Referral_user::class,'referral_id','id');
    }

    public static function randomLink($n) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}
