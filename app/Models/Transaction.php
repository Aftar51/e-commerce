<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'courier',
        'payment',
        'payment_url',
        'status',
        'total_price'
    ];

    protected function user() 
    {
        return $this->belongsTo(User::class);
    }

    protected function transaction_Items() 
    {
        return $this->hasMany(TransactionItems::class);
    }
}
