<?php

use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Models\Order;
use App\User;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 20; $i++) {

            //CREATE USER 
            $user = User::create([
                'name'      => 'user'.$i+1,
                'email'     => 'user'.$i.'@mail.com',
                'password'  => bcrypt('password'),
                'role'      => 'user',
                'status'    => 'active',
            ]);

            $product = Product::create([
                'name'                  => 'Produk '.$i+1,
                'product_category_id'   => 1,
                'summary'               => 'summary produk 1',
                'description'           => 'deksripsi',
                'stock'                 => 10,
                'price'                 => '100000',
                'user_id'               => 1,
            ]);
    
            $product->productPhotos()->create([
                'photo'         => 'photos',
                'is_primary'    => 1
            ]);

            $randomLoop = random_int(1,10);
            for($j = 0; $j < $randomLoop; $j++) {
                $randQty = random_int(1, 25);
                $cart = $product->cart()->create([
                    'user_id'   => $user->id,
                    'quantity'  => $randQty,
                    'amount'    => $randQty * $product->getAttributes()['price'],
                    'price'     => $product->getAttributes()['price']
                ]);

                $sub_total = $cart->sum('amount');
                $quantity  = $cart->sum('quantity');

                $order = $cart->order()->create([
                    'order_number'      => 'ORD-'.strtoupper(Str::random(10)),
                    'user_id'           => $user->id,
                    'shipping_id'       => 1,
                    'sub_total'         => $sub_total,
                    'quantity'          => $quantity,
                    'total_amount'      => $sub_total,
                    'first_name'        => $user->name,
                    'last_name'         => $user->name,
                    'email'             => $user->email,
                    'phone'             => random_int(1,100),
                    'address1'          => 'Jalan jalan'
                ]);

                $cart->update(['order_id' => $order->id]);
            }
        }
    }
}
