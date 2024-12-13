<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUpdateHistory extends Model
{
    use HasFactory;

    protected $primaryKey = 'history_id';

    protected $fillable = [
        'product_id',
        'user_id',
        'previous_stock',
        'updated_stock',
        'updated_by',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}