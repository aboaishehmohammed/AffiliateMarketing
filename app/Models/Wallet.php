<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function latestTransactions()
    {
        return $this->transactions()->latest();
    }

    public function incomeTransactions()
    {
        return $this->transactions()->where('type', 'income');
    }

    public function expensesTransactions()
    {
        return $this->transactions()->where('type', 'expenses');
    }
   public static function comparator($object1, $object2) {
        return $object1[0] > $object2[0];
    }
}
