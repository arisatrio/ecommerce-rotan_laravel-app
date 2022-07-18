<?php

use Illuminate\Database\Seeder;

use App\Models\Shipping;

class ShippingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shipping::create([
            'type'          => 'Kargo',
            'destination'   => 'Wilayah III Cirebon',
            'price'         => '15000',
            'user_id'       => 1,
        ]);

        Shipping::create([
            'type'          => 'Kargo',
            'destination'   => 'Pulau Jawa',
            'price'         => '50000',
            'user_id'       => 1,
        ]);
    }
}
