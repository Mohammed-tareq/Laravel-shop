<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'status',
        'category_id',
        'image',
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
