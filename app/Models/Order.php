<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Items ()
    {
        return $this->hasMany(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function totalPrice(){
        $total = 0;
        foreach($this->items as $item){
            $total += $item->product->price * $item['quantity'];
        }
        return $total;
    }
}
