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
        $product = [
            [
                'event_name' => "Pagelaran Budaya 2019",
                'date' => "10-10-2019",
                'time' => "18.00",
                'place' => "TBD",
                'organizer_name' => "PLYK",
                'stock' => 800,
                'created_at' => new DateTime,
                'updated_at' => null
            ],
            [
                'event_name' => "Pagelaran Budaya 2019",
                'date' => "10-10-2019",
                'time' => "18.00",
                'place' => "TBD",
                'organizer_name' => "PLYK",
                'stock' => 25,
                'created_at' => new DateTime,
                'updated_at' => null
            ],
            [
                'event_name' => "Pagelaran Budaya 2019",
                'date' => "10-10-2019",
                'time' => "18.00",
                'place' => "TBD",
                'organizer_name' => "PLYK",
                'stock' => 15,
                'created_at' => new DateTime,
                'updated_at' => null
            ]
        ];
    
            DB::table('products')->insert($product);
    }
}
