<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'address1',
        'address2',
        'city',
        'zip'
    ];
    public function products()
{
    return $this->belongsToMany(Product::class, 'order_product')
                ->withPivot('quantity', 'price_at_time');
}

}
