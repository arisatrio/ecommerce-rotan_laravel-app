<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::create([
            'parent_id'     => NULL,
            'name'          => 'Furniture',
            'slug'          => Str::slug('name'),
            'description'   => 'Kategori produk furniture',
            'is_parent'     => 1,
            'status'        => 'active',
            'user_id'       => 1,
        ]);
    }
}
