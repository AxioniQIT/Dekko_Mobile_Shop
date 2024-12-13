<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'bill_detail_id';

    protected $fillable = [
        'bill_id',
        'product_id',
        'repair_id',
        'quantity',
        'price_per_unit',
        'total_price',
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'bill_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function repair()
    {
        return $this->belongsTo(Repair::class, 'repair_id');
    }
}