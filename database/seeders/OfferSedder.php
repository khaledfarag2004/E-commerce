<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\String\s;

class OfferSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('offers')->insert([
            'id' => 1,
            'name' => 'offer 1',
            'product_id' => 1,
            'discount_percentage' => 20,
            'start_date' => now(),
            'end_date' => now(),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('offers')->insert([
            'id' => 2,
            'name' => 'offer 2',
            'product_id' => 2,
            'discount_percentage' => 10,
            'start_date' => now(),
            'end_date' => now(),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('offers')->insert([
            'id' => 3,
            'name' => 'offer 3',
            'product_id' => 3,
            'discount_percentage' =>5,
            'start_date' => now(),
            'end_date' => now(),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('offers')->insert([
            'id' => 4,
            'name' => 'offer 4',
            'product_id' => 4,
            'discount_percentage' => 50,
            'start_date' => now(),
            'end_date' => now(),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
