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

        $i = 1;

        DB::table('estates')->insert([
            [
                'name' => 'Monitor Acer',
                'value' => 789,
                'label_id' => 481,
                'categories_id' => 1,
                'sub_categories_id' => 2,
                'seller_id' =>  1,

            ], [
                'name' => 'Cadeira Cavaletti',
                'value' => 490,
                'label_id' => 120,
                'categories_id' => 2,
                'sub_categories_id' => 6,
                'seller_id' =>  null,

            ], [
                'name' => 'Monitor Dell',
                'value' => 999,
                'label_id' => 482,
                'categories_id' => 1,
                'sub_categories_id' => 2,
                'seller_id' =>  1,

            ], [
                'name' => 'Monitor Dell',
                'value' => 999,
                'label_id' => 483,
                'categories_id' => 1,
                'sub_categories_id' => 2,
                'seller_id' =>  1,
            ], [
                'name' => 'Monitor Dell',
                'value' => 999,
                'label_id' => 484,
                'categories_id' => 1,
                'sub_categories_id' => 2,
                'seller_id' =>  1,
            ], [
                'name' => 'Monitor Dell',
                'value' => 999,
                'label_id' => 485,
                'categories_id' => 1,
                'sub_categories_id' => 2,
                'seller_id' =>  1,
            ], [
                'name' => 'Headset C3 Tech',
                'value' => 30,
                'label_id' => 200,
                'categories_id' => 1,
                'sub_categories_id' => 9,
                'seller_id' =>  1,


            ], [
                'name' => 'Headset C3 Tech',
                'value' => 30,
                'label_id' => 201,
                'categories_id' => 1,
                'sub_categories_id' => 9,
                'seller_id' =>  1,
            ], [
                'name' => 'Headset C3 Tech',
                'value' => 30,
                'label_id' => 202,
                'categories_id' => 1,
                'sub_categories_id' => 9,
                'seller_id' =>  1,
            ], [
                'name' => 'Headset C3 Tech',
                'value' => 30,
                'label_id' => 203,
                'categories_id' => 1,
                'sub_categories_id' => 9,
                'seller_id' =>  1,
            ], [
                'name' => 'Headset C3 Tech',
                'value' => 30,
                'label_id' => 204,
                'categories_id' => 1,
                'sub_categories_id' => 9,
                'seller_id' =>  1,
            ], [
                'name' => 'Headset C3 Tech',
                'value' => 30,
                'label_id' => 205,
                'categories_id' => 1,
                'sub_categories_id' => 9,
                'seller_id' =>  1,
            ], [
                'name' => 'Notebook Acer Nitro 5',
                'value' => 5300,
                'label_id' => 430,
                'categories_id' => 1,
                'sub_categories_id' => 4,
                'seller_id' =>  null,

            ], [
                'name' => 'Notebook Acer Nitro 5',
                'value' => 5300,
                'label_id' => 431,
                'categories_id' => 1,
                'sub_categories_id' => 4,
                'seller_id' =>  null,

            ], [
                'name' => 'Notebook Acer Nitro 5',
                'value' => 5300,
                'label_id' => 432,
                'categories_id' => 1,
                'sub_categories_id' => 4,
                'seller_id' =>  null,
            ], [
                'name' => 'Notebook Dell G3',
                'value' => 5750.50,
                'label_id' => 433,
                'categories_id' => 1,
                'sub_categories_id' => 4,
                'seller_id' =>  null,

            ], [
                'name' => 'Notebook Dell G3',
                'value' => 5750.50,
                'label_id' => 434,
                'categories_id' => 1,
                'sub_categories_id' => 4,
                'seller_id' =>  null,
            ], [
                'name' => 'Notebook Dell G3',
                'value' => 5750.50,
                'label_id' => 435,
                'categories_id' => 1,
                'sub_categories_id' => 4,
                'seller_id' =>  null,
            ], [
                'name' => 'Notebook Asus Aspire5',
                'value' => 4500,
                'label_id' => 435,
                'categories_id' => 1,
                'sub_categories_id' => 4,
                'seller_id' =>  null,
            ], [
                'name' => 'Teclado Dell',
                'value' => 120,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 4,
                'seller_id' =>  null,

            ], [
                'name' => 'Teclado Dell',
                'value' => 120,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 4,
                'seller_id' =>  null,
            ], [
                'name' => 'Teclado Dell',
                'value' => 120,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 4,
                'seller_id' =>  2,

            ], [
                'name' => 'Teclado Dell',
                'value' => 120,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 4,
                'seller_id' =>  2,
            ], [
                'name' => 'Teclado Dell',
                'value' => 120,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 4,
                'seller_id' =>  2,

            ], [
                'name' => 'Teclado Dell',
                'value' => 120,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 4,
                'seller_id' =>  2,
            ], [
                'name' => 'Teclado Dell',
                'value' => 120,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 4,
                'seller_id' =>  2,
            ], [
                'name' => 'Teclado Dell',
                'value' => 120,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 4,
                'seller_id' =>  2,
            ], [
                'name' => 'Teclado Dell',
                'value' => 120,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 4,
                'seller_id' =>  2,
            ], [
                'name' => 'Teclado Dell',
                'value' => 120,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 4,
                'seller_id' =>  2,
            ], [
                'name' => 'Teclado Dell',
                'value' => 120,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 4,
                'seller_id' =>  2,
            ], [
                'name' => 'Mouse Dell',
                'value' => 79,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 5,
                'seller_id' =>  2,

            ], [
                'name' => 'Mouse Dell',
                'value' => 79,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 5,
                'seller_id' =>  2,
            ], [
                'name' => 'Mouse Dell',
                'value' => 79,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 5,
                'seller_id' =>  2,
            ], [
                'name' => 'Mouse Dell',
                'value' => 79,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 5,
                'seller_id' =>  2,
            ], [
                'name' => 'Mouse Dell',
                'value' => 79,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 5,
                'seller_id' =>  2,
            ], [
                'name' => 'Mouse Dell',
                'value' => 79,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 5,
                'seller_id' =>  2,
            ], [
                'name' => 'Mouse Dell',
                'value' => 79,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 5,
                'seller_id' =>  2,
            ], [
                'name' => 'Mouse Dell',
                'value' => 79,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 5,
                'seller_id' =>  2,
            ], [
                'name' => 'Mouse Dell',
                'value' => 79,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 5,
                'seller_id' =>  2,
            ], [
                'name' => 'Fonte Notebook Dell',
                'value' => 79,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 10,
                'seller_id' =>  2,

            ], [
                'name' => 'Fonte Notebook Dell',
                'value' => 79,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 10,
                'seller_id' =>  2,
            ], [
                'name' => 'Fonte Notebook Dell',
                'value' => 79,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 10,
                'seller_id' =>  2,
            ], [
                'name' => 'Fonte Notebook Dell',
                'value' => 79,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 10,
                'seller_id' =>  2,
            ], [
                'name' => 'Fonte Notebook Acer',
                'value' => 170,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 10,
                'seller_id' =>  2,
            ], [
                'name' => 'Fonte Notebook Acer',
                'value' => 170,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 10,
                'seller_id' =>  2,
            ], [
                'name' => 'Fonte Notebook Acer',
                'value' => 170,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 10,
                'seller_id' =>  2,
            ], [
                'name' => 'Monitor LG UltraWide 25',
                'value' => 1200,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 2,
                'seller_id' =>  2,
            ], [
                'name' => 'Monitor LG UltraWide 25',
                'value' => 1200,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 2,
                'seller_id' =>  2,
            ], [
                'name' => 'Monitor LG UltraWide 25',
                'value' => 1200,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 2,
                'seller_id' =>  2,
            ], [
                'name' => 'Monitor LG UltraWide 25',
                'value' => 1200,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 2,
                'seller_id' =>  2,
            ], [
                'name' => 'Monitor LG 25',
                'value' => 789,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 2,
                'seller_id' =>  2,
            ], [
                'name' => 'Monitor LG 27',
                'value' => 899,
                'label_id' => $i = $i + 1,
                'categories_id' => 1,
                'sub_categories_id' => 2,
                'seller_id' =>  2,
            ]
        ]);
    }
}
