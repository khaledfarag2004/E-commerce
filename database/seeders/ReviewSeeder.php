<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
           'id' => 1,
           'user_id' => 1,
           'product_id' => 1,
           'comment' => 'Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry,s standard dummy text ever since the 1500s, ',
            'rating' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'id' => 2,
            'user_id' => 1,
            'product_id' => 2,
            'comment' => 'Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry,s standard dummy text ever since the 1500s, ',
            'rating' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'id' => 3,
            'user_id' => 1,
            'product_id' => 3,
            'comment' => 'Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry,s standard dummy text ever since the 1500s, ',
            'rating' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'id' => 4,
            'user_id' => 1,
            'product_id' => 4,
            'comment' => 'Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry,s standard dummy text ever since the 1500s, ',
            'rating' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
