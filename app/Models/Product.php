<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $dates = ['delated_at'];
    protected $fillable = ['title', 'description', 'quantity', 	'manufacturer_id', 'price', 'sort_order', 'status'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'products_to_categories', 'product_id', 'category_id');
    }
}
