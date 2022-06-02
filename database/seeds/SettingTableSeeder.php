<?php

use Illuminate\Database\Seeder;

use App\Models\Settings;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::create([
            'short_des'     => 'Rattan Shop',
            'description'   => 'Pusat Penjualan Rotan Online',
            'photo'         => 'photos',
            'address'       => 'Jl. Lohbener lama No.8',
            'phone'         => '08123456',
            'email'         => 'info@rattan-shop.com',
            'logo'          => 'logo',
            'user_id'       => 1,
        ]);
    }
}
