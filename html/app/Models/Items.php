<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id', 
        'amount',
        'product_id',
        'order_id'
    ];

    /**
     * The validations for each attribute.
     *
     * @var string[]
     */
    public static $rules = [
        'amount' => "required|numeric",
        'product_id' => "required|numeric|exists:products,id",
        'order_id' => "required|numeric|exists:orders,id"
    ];

     /**
     * This entity belongs to Product
     * 
     * @return Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

     /**
     * This entity belongs to Order
     * 
     * @return Order
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
