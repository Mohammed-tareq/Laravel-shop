<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'status',
        'category_id',
        'image',

    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
