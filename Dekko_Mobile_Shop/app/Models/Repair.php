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
}
