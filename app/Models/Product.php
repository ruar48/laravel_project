<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'parent_id', 
        'image',
        'name', 
        'category_id', 
        'quantity', 
        'price', 
        'serial_number'
    ];

    public function parent()
    {
        return $this->belongsTo(Product::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Product::class, 'parent_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
