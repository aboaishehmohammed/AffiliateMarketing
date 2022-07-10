<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral_user extends Model
{
    public $x,$y;
    use HasFactory;
    protected $fillable = [
        'user_id',
        'referral_id',
    ];
    public function referralUsers()
    {
        return $this->hasOne(User::class, 'id','referral_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }

}
