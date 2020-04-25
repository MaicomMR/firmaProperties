<?php

use Illuminate\Database\Seeder;

class EstatesForTest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */

        DB::table('estates')->insert([
            [
                'name' => 'Monitor Acer',
                'value' => 547.8,
                'label_id' => 448,
                'categories_id' => 2,
                'sub_categories_id' => 2,
                'seller_id' => 1,
            ]
        ]);
    }
}
