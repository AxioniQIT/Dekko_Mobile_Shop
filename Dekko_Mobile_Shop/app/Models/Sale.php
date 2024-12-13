<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'sale_id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'sale_date',
        'customer_name',
        'customer_contact',
        'total_amount',
        'payment_method',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'sale_details')
            ->withPivot('quantity', 'price_per_unit', 'total_price');
    }

}
