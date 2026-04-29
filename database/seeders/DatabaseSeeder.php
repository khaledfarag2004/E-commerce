<?php

namespace Database\Seeders;

use App\Models\Offer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(CategorieSeeder::class);
        User::factory()->create([
            'id' => 1,
            'name' => 'administrator',
            'phone' => '0123456789',
            'address' => 'Test Address',
            'email' => 'admin@example.com',
            'password' => bcrypt('123456789'),
            'role_id' => 1,
            'status' => 1,

        ]);
        $this->call(ProductSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(OfferSedder::class);
    }
}
