<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Marca::factory(6)->create();
        \App\Models\Categoria::factory(6)->create();
        \App\Models\Produto::factory(24)->create();
    }
}
