<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $p = Product::find(1);

        if ($p) {
            $p->variants()->createMany([
                [
                    'attribute_name' => 'Weight',
                    'attribute_value' => '1 kg',
                    'price' => 300,
                    'original_price' => 400,
                    'stock' => 50
                ],
                [
                    'attribute_name' => 'Weight',
                    'attribute_value' => '2 kg',
                    'price' => 600,
                    'original_price' => 700,
                    'stock' => 30
                ]
            ]);
        }
    }
}
