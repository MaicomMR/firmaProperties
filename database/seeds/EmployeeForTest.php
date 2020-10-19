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

        for ($insertData = 0; $insertData < 10; $insertData++){
        $randomPerson = [
            [
                'name' => 'Maicom Rodeghiero',
                'cpf' => "147.147.147-55",
                'phone' => "539998887771",
                'adress' => "Rua. Santa Efigênia",
                'adressNumber' => 1044,
                'district' => "Fragata",
                'city' => "Pelotas",
                'zipCode' => "96150000",
            ], [
                'name' => 'Edécio Iepsen',
                'cpf' => "123.456.789-55",
            ],               [
                'name' => 'Ângelo Luz',
                'cpf' => "123.456.789-55",
                'phone' => "539998887771",
            ],               [
                'name' => 'Gladimir Catarino',
                'cpf' => "123.456.789-55",
                'phone' => "539998887771",
                'adress' => "Rua. Santa Efigênia",
            ],               [
                'name' => 'Tom Cruise',
                'cpf' => "123.456.789-55",
                'phone' => "539998887771",
                'adress' => "Rua. Santa Efigênia",
                'adressNumber' => 1044,
            ],               [
                'name' => 'Chuck Norris',
                'cpf' => "123.456.789-55",
                'phone' => "539998887771",
                'adress' => "Rua. Santa Efigênia",
                'adressNumber' => 1044,
                'district' => "Fragata",
            ],               [
                'name' => 'Jhon Wick',
                'cpf' => "123.456.789-55",
                'adress' => "Rua. Santa Efigênia",
                'district' => "Fragata",
                'city' => "Pelotas",
                'zipCode' => "96150000",
            ],

        ];
        }
    }
}
