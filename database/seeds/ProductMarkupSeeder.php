<?php

use Illuminate\Database\Seeder;

class ProductMarkupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_markup = [ 
                        ['product_id' => "1", 'markup' => 10, 'min_amount' => 30, 'max_amount' => 40, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
                        ['product_id' => "1", 'markup' => 20, 'min_amount' => 20, 'max_amount' => 29, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
                        ['product_id' => "1", 'markup' => 30, 'min_amount' => 10, 'max_amount' => 19, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],

                        ['product_id' => "2", 'markup' => 10, 'min_amount' => 1000, 'max_amount' => 1999, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
                        ['product_id' => "2", 'markup' => 20, 'min_amount' => 2000, 'max_amount' => 5000, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
                        ['product_id' => "2", 'markup' => 30, 'min_amount' => 5001, 'max_amount' => 20000, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
                    ];
        DB::table('product_markup')->insert($product_markup);
    }
}
