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
                'name' => 'Outros',
            ],[
                'name' => 'Monitor',
            ],[
                'name' => 'Gabinete',
            ],[
                'name' => 'Notebook',
            ],[
                'name' => 'Mouse',
            ],[
                'name' => 'Cadeiras',
            ],[
                'name' => 'Mobília',
            ]
        ]);
    }
}
