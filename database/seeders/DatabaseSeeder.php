<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $time1 = microtime(true);
        \App\Models\User::factory(10)->create();
        User::factory()->create([
            'email' => 'pruebas@example.com'
        ]);
        \App\Models\Owner::factory(10)->create();
        \App\Models\Dog::factory(1000)->create();
        \App\Models\Park::factory(10)->create();
        $time = round(microtime(true) - $time1,3);
        echo "Seeding time $time s\n";
    }
}
