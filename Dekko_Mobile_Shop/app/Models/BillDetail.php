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

    public function calculateTotalPrice()
    {
        // Initialize the total price variable
        $totalPrice = 0;
        // Calculate the price for sale items, repair costs, or spare parts used
        if ($this->product_id) {
            // For sale items
            $totalPrice = $this->quantity * $this->price_per_unit;
        } elseif ($this->repair_id) {
            // For repair costs, use the repair total (assuming it's calculated elsewhere)
            $totalPrice = $this->price_per_unit;
        } elseif ($this->spare_part_id) {
            // For spare parts used
            $totalPrice = $this->quantity * $this->price_per_unit;
        }
        $bill = $this->bill; // Assuming you have a relationship set up to get the associated bill
        // Check if the related bill has a discount
        if ($bill && isset($bill->discount)) {
            // Apply the discount to the total price
            $discountAmount = ($bill->discount / 100) * $totalPrice;
            $totalPrice -= $discountAmount; // Subtract the discount from the total price
        }
        // Set the total price and save the bill detail
        $this->total_price = $totalPrice;
        $this->save();
    }

}
