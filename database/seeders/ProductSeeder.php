<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'id' => 1,
            'name' => 'Grapes',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt',
            'price' => 4.99,
            'image' => 'img/fruite-item-1.jpg',
            'status' => 1,
            'user_id' => 1,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'id' => 2,
            'name' => 'Raspberries',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt',
            'price' => 4.99,
            'image' => 'img/fruite-item-2.jpg',
            'status' => 1,
            'user_id' => 1,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'id' => 3,
            'name' => 'Apricots',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt',
            'price' => 4.99,
            'image' => 'img/fruite-item-3.jpg',
            'status' => 1,
            'user_id' => 1,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'id' => 4,
            'name' => 'Banana',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt',
            'price' => 4.99,
            'image' => 'img/fruite-item-4.jpg',
            'status' => 1,
            'user_id' => 1,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'id' => 5,
            'name' => 'Oranges',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt',
            'price' => 4.99,
            'image' => 'img/fruite-item-5.jpg',
            'status' => 1,
            'user_id' => 1,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'id' => 6,
            'name' => 'Raspberries',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt',
            'price' => 4.99,
            'image' => 'img/fruite-item-2.jpg',
            'status' => 1,
            'user_id' => 1,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'id' => 7,
            'name' => 'Apricots',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt',
            'price' => 4.99,
            'image' => 'img/fruite-item-3.jpg',
            'status' => 1,
            'user_id' => 1,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'id' => 8,
            'name' => 'Grapes',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt',
            'price' => 4.99,
            'image' => 'img/fruite-item-1.jpg',
            'status' => 1,
            'user_id' => 1,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
