<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderItem extends Model
{
    use HasFactory;
    protected $guarded  = [''];//不可被修改的資料欄位

    public function product(){
        return $this->belongsTo(product::class);
    }
    public function order(){
        return $this->belongsTo(order::class);
    }
    
}
