<?php

namespace Database\Seeders;

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

        $this->call([
            // PackageSeeder::class,
            // ClientSeeder::class,
            UserSeeder::class,
            // EventSeeder::class,
            // VendorSeeder::class,
            // GallerySeeder::class,
            // ContentSeeder::class,
            // FAQSeeder::class,
        ]);
    }
}
