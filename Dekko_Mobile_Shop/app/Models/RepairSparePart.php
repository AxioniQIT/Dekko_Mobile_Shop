<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class RepairSparePart extends Model
{

    use HasFactory;

    // Define the table name

    protected $table = 'repair_spare_parts';

    // The primary key for the table

    protected $primaryKey = 'repair_spare_part_id';

    // Define the fillable fields for mass assignment

    protected $fillable = [

        'repair_id',

        'spare_part_id',

        'quantity',

        'total_price',

    ];

    // Relationship with Repair

    public function repair()
    {

        return $this->belongsTo(Repair::class, 'repair_id');

    }

    // Relationship with SparePart

    public function sparePart()
    {

        return $this->belongsTo(SparePart::class, 'spare_part_id');

    }

    /**

     * Calculate the total price for this spare part.

     * This will be the quantity * spare part price.

     *

     * @return void

     */

    public function calculateTotalPrice()
    {

        $sparePart = $this->sparePart; // Get the spare part model

        $this->total_price = $this->quantity * $sparePart->price; // Calculate total price

        $this->save(); // Save the total price to the database

    }

}

