<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::upsert([
        ['id'=>10,'title'=>'固定測試資料','content'=>'測試內容','price'=>rand(1,300),'quantity'=>300],
        ['id'=>11,'title'=>'固定測試資料','content'=>'測試內容','price'=>rand(1,300),'quantity'=>300],
        ['id'=>12,'title'=>'固定測試資料','content'=>'測試內容','price'=>rand(1,300),'quantity'=>300],
        ['id'=>13,'title'=>'固定測試資料','content'=>'測試內容','price'=>rand(1,300),'quantity'=>300],
        ],['id'],['price','quantity']);
        //
    }
}
