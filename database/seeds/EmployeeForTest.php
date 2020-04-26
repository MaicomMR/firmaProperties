<?php

use Illuminate\Database\Seeder;

class EmployeeForTest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            [
                'name' => 'Exemplerino da Silva',
                'cpf' => '00011122211',
            ]
        ]);
    }
}
