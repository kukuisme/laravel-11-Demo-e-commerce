<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=[''];
    use HasFactory;
    public function cartItems(){
        return $this->hasMany(CartItem::class);
    }
    public function orderItems(){
        return $this->
        hasMany(OrderItem::class);
    }
    public function checkQuantity($quantity){
        if($this->quantity < $quantity){
            return false;
        }else{
            return true;
        }
    }
}
