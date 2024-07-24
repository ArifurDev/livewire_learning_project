<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Order;
use App\Models\OrderInfo;
use App\Models\Subscribe;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Order::factory()->count(10)->create();
        OrderInfo::factory()->count(10)->create();
        Subscribe::factory()->count(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
       $this->call(AdminSeeder::class);
       $this->call(routeSeeder::class);
    }
}
