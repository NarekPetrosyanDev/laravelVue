<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['name', 'phone', 'status', 'sum'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')->withPivot('count')->withTimestamps();
    }

    public function getFullSum()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }


    public function saveOrder($name, $email, $phone, $sum, $status)
    {
        if ($this->status == 0) {
            $this->update([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'sum' => $sum,
                'status' => $status
            ]);
            session()->forget('orderId');
            return true;
        } else {
            return false;
        }

    }

}
