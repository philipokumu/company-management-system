<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();

        $defaultUser = \App\Models\User::factory()
            ->create([
                'email' => 'admin@example.com',
            ]);

        $companies = \App\Models\Company::factory(2)
                        ->hasEmployees(2)
                        ->create();

        $todos = \App\Models\Todo::factory(3)->create();
    }
}
