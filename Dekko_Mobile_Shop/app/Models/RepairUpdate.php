<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairUpdate extends Model
{
    use HasFactory;

    protected $primaryKey = 'update_id';

    protected $fillable = ['repair_id', 'update_description'];

    public function repair()
    {
        return $this->belongsTo(Repair::class, 'repair_id');
    }
}