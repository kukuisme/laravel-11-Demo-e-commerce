<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Product::create(['title'=>'測試資料','content'=>'測試內容','price'=>rand(1,300),'quantity'=>300]);
        Product::create(['title'=>'測試資料2','content'=>'測試內容','price'=>rand(1,300),'quantity'=>300]);
        Product::create(['title'=>'測試資料3','content'=>'測試內容','price'=>rand(1,300),'quantity'=>300]);
        $this->call(ProductSeeder::class);
        $this->command->info('產生固定product資料');
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
