<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /*Reference of table product to category table in graph */
    protected $fillable = ['name', 'description', 'price', 'category_id'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
