<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id', 
        'sku',
        'name',
        'price',
        'stock',
        'category_id'
    ];

    /**
     * The validations for each attribute.
     *
     * @var string[]
     */
    public static $rules = [
        'sku' => "required|max:8",
        "name" => "required|max:256",
        'price' => "required",
        'stock' => "required|numeric",
        'category_id' => "required|numeric|exists:categories,id"
    ];

     /**
     * This entity belongs to Category
     * 
     * @return Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
