<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{

    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'category_id';


    protected $fillable = [
        'category_name',
        'description',
    ];



    // If the primary key is not an incrementing integer
    public $incrementing = true;

    // If your primary key is not the default "id"
    protected $keyType = 'string'; // Set to 'int' if it's a bigint or leave as default for auto-incrementing

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }
}