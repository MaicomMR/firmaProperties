<?php

use Illuminate\Database\Seeder;

class Sellers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sellers')->insert([
            [
                'name' => 'Kabum',
            ],
            [
                'name' => 'Pichau',
            ]
        ]);
    }
}
