<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id', 
        'order_id',
        'customer_id'
    ];

    /**
     * The validations for each attribute.
     *
     * @var string[]
     */
    public static $rules = [
        'order_id' => "required|max:36",
        'customer_id' => "required|numeric|exists:customers,id"
    ];

     /**
     * This entity belongs to Customer
     * 
     * @return Customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
