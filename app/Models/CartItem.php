<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use HasFactory; 
    use SoftDeletes;
//    protected $fillable = ['product_id','cart_id','updated_at','created_at','quantity'];//可修改通行
    protected $guarded  = [''];//不可被修改的資料欄位
    // protected $hidden   = [''];//不要被顯示
    // protected $append   = ['current_price'];
    
    public function getCurrentPriceAttribute(){
        return $this->quantity*11;
    }
    
    public function product(){
        return $this->belongsTo(product::class); //Searching  will be tabulated
    }

    public function cart(){

        return $this->belongsTo(Cart::class); 
    }
}
