<?php

namespace Database\Seeders;

use App\Models\CpuSocket;
use App\Models\MemoryType;
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

        $this->call([
            CpuSocketSeeder::class,
            ManufacturerSeeder::class,
            ArchitectureSeeder::class,
            MemoryTypeSeeder::class,

            FamilySeeder::class,
            CpuSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
