<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345'),
        ]);
        \App\Models\Service::factory()->createMany([
            'name' => 'Cho thuê',
            'slug' => 'cho-thue',
            'type' => 'for_rent',
        ],[
            'name' => 'Chuyển nhượng',
            'slug' => 'cho-thue',
            'type' => 'for_rent',
        ],[
            'name' => 'Bảo trì',
            'slug' => 'bao-tri',
            'type' => 'maintenance',
        ],[
            'name' => 'Xử lý thấm ngấm',
            'slug' => 'xu-ly-tham-ngam',
            'type' => 'maintenance',
        ]);
    }
}
