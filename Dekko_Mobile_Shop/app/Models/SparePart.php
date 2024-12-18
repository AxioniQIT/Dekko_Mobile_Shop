<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparePart extends Model
{
    use HasFactory;

    // Define the table name if it's different from the pluralized model name
    protected $table = 'spare_parts';

    // The primary key for the table
    protected $primaryKey = 'spare_part_id';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock_quantity',
    ];

    // Optionally, you can specify hidden fields to not include in JSON responses
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Optionally, specify cast types for attributes
    protected $casts = [
        'price' => 'decimal:2',
        'stock_quantity' => 'integer',
    ];

    /**
     * Method to update stock quantity after a repair uses spare parts.
     */
    public function updateStockQuantity($quantity)
    {
        $this->decrement('stock_quantity', $quantity);
    }
}
