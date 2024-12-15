<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    protected $table = 'sale_details';


    protected $fillable = [
        'sale_id',
        'product_id',
        'quantity',
        'price_per_unit',
        'total_price',
    ];

    public function sale(){
        return $this->belongsTo(Sale::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }




}
