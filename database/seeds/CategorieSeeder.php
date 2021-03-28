<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Vitamins',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cold, flu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Headache',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vision care',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Skincare',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
