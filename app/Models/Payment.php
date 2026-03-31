<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;


    protected $fillable = [
        'reference',
        'payable_type',
        'payable_id',
        'payment_type',
        'transaction_code',
        'amount',
        'status',
    ];
    public function payable()
    {
        return $this->morphTo();
    }
    public function type()
    {
        return $this->belongsTo(PaymentType::class, 'payment_type');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'payable_id');
    }
}
