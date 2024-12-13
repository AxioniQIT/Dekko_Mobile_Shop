<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $primaryKey = 'bill_id';

    protected $fillable = [
        'user_id',
        'customer_name',
        'total_amount',
        'bill_date',
        'billing_type',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function details()
    {
        return $this->hasMany(BillDetail::class, 'bill_id');
    }

}
