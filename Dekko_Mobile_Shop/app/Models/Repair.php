<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory;

    protected $primaryKey = 'repair_id';

    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_contact',
        'device_details',
        'issue_description',
        'estimated_cost',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function updates()
    {
        return $this->hasMany(RepairUpdate::class, 'repair_id');
    }

    // Relationship with RepairSparePart
    public function repairSpareParts()
    {
        return $this->hasMany(RepairSparePart::class, 'repair_id');
    }

    // Calculate the full cost of a repair, including the spare parts.
    public function calculateFullCost()
    {
        $sparePartsCost = $this->repairSpareParts->sum('total_price'); // Sum all spare part total prices
        $this->full_cost = $this->estimated_cost + $sparePartsCost;
        $this->save();
    }
}
