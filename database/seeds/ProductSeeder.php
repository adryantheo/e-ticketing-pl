<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = 
        [
            'event_name' => "Pagelaran Budaya 2019",
            'stock' => 850,
            'created_at' => new DateTime,
            'updated_at' => null
        ];

        DB::table('products')->insert($product);
    }
}
