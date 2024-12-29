<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Customer extends Model
{
    //
    use HasFactory;

    protected $fillable = [
       'permanent_address', 'name', 'phone_number', 'email',  'clothes_type','status','clothes_weight','total_bill'
    ];
    protected $attributes = [
        'status' => 'Not Paid',
    ];

    protected static function booted()
    {
        static::saving(function ($customer) {
            // Calculate total bill based on type and weight
            $pricePerKg = match ($customer->clothes_type) {
                'Cotton' => 100,
                'Silk' => 20,
                'Wool' => 120,
                default => 0,
            };

            $customer->total_bill = $customer->clothes_weight * $pricePerKg;
        });
    }
}
 