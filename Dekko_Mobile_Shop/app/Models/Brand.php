<?php

// app/Models/Brand.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';
    protected $primaryKey = 'brand_id';
    protected $fillable = ['brand_name', 'model_name', 'description'];

    // Many-to-many relationship with spare_parts
    public function spareParts()
    {
        return $this->belongsToMany(SparePart::class, 'brand_spare_part', 'brand_id', 'spare_part_id');
    }
}
