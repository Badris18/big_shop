<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable=[
        'product_id',
        'customer_id',
        'qty',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function totalPrice()
    {
        return $this->qty* $this->product->price;
    }

    public static function grandTotal($customId)
    {

        $cartItem = Cart::where('customer_id',$customId)->get();
        $total =$cartItem->sum(function($item){
            return $item->totalPrice();
        });

        return $total;
    }
}
