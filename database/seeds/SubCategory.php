<?php

use Illuminate\Database\Seeder;

class SubCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categories')->insert([
            [
                'name' => 'Outro',
            ],[
                'name' => 'Monitor',
            ],[
                'name' => 'Gabinete',
            ],[
                'name' => 'Notebook',
            ],[
                'name' => 'Mouse',
            ],[
                'name' => 'Cadeira',
            ],[
                'name' => 'Mobília',
            ],[
                'name' => 'Teclado',
            ],[
                'name' => 'Headset',
            ],[
                'name' => 'Fonte de Energia',
            ],[
                'name' => 'Celular',
            ]
        ]);
    }
}
