<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemLog extends Model
{
    use HasFactory;

    protected $primaryKey = 'log_id';

    protected $fillable = [
        'user_id',
        'activity_type',
        'activity_description',
        'activity_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
