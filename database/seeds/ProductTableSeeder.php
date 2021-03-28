<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'article' => 'VC5468',
                'name' => 'Vitamin C 1000mg',
                'quantity' => 52,
                'price' => 5.80,
                'country' => 'Europe',
                'created_at' => now(),
                'updated_at' => now(),
                'categories_id' => 1,

            ],
            [
                'article' => 'VT5674',
                'name' => 'Vitiron',
                'quantity' => 70,
                'price' => 12.26,
                'country' => 'Europe',
                'created_at' => now(),
                'updated_at' => now(),
                'categories_id' => 1,

            ],
            [
                'article' => 'GX468P',
                'name' => 'Grindex 500',
                'quantity' => 40,
                'price' => 10.50,
                'country' => 'Europe',
                'created_at' => now(),
                'updated_at' => now(),
                'categories_id' => 1,

            ],
            [
                'article' => 'HY43GH',
                'name' => 'Hylocare',
                'quantity' => 28,
                'price' => 12.30,
                'country' => 'Europe',
                'created_at' => now(),
                'updated_at' => now(),
                'categories_id' => 4,

            ],
            [
                'article' => 'BC1025',
                'name' => 'Bioactive Carotene N90',
                'quantity' => 30,
                'price' => 15.12,
                'country' => 'Europe',
                'created_at' => now(),
                'updated_at' => now(),
                'categories_id' => 1,

            ],
            [
                'article' => 'JN546X',
                'name' => 'Jonax D3 MAX 10ml',
                'quantity' => 38,
                'price' => 3.83,
                'country' => 'Other',
                'created_at' => now(),
                'updated_at' => now(),
                'categorie_id' => 1,

            ],
            [
                'article' => 'NT476X',
                'name' => 'Nateo D3 vitamin 2000 SV, N30 ',
                'quantity' => 52,
                'price' => 9.65,
                'country' => 'Usa',
                'created_at' => now(),
                'updated_at' => now(),
                'categories_id' => 1,

            ],
            [
                'article' => 'VT126N',
                'name' => 'Viaderm BEAUTY N30',
                'quantity' => 56,
                'price' => 18.78,
                'country' => 'Europe',
                'created_at' => now(),
                'updated_at' => now(),
                'categories_id' => 1,

            ],
            [
                'article' => 'FV525F',
                'name' => 'Fervex',
                'quantity' => 30,
                'price' => 4.52,
                'country' => 'Europe',
                'created_at' => now(),
                'updated_at' => now(),
                'categories_id' => 2,

            ],
            [
                'article' => 'FV525F',
                'name' => 'Eucerin AQUAporin Active Day Cream SPF25',
                'quantity' => 30,
                'price' => 12.00,
                'country' => 'Europe',
                'created_at' => now(),
                'updated_at' => now(),
                'categories_id' => 5,

            ],
            [
                'article' => 'CT396F',
                'name' => 'Citramon Forte',
                'quantity' => 50,
                'price' => 4.10,
                'country' => 'Europe',
                'created_at' => now(),
                'updated_at' => now(),
                'categories_id' => 3,

            ],

    ]);
    }
}
