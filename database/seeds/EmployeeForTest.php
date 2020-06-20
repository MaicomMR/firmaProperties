<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;




class EmployeeForTest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $faker = Faker::create('pt_BR');

        for ($insertData = 0; $insertData < 100; $insertData++){
        $randomPerson = [
            [
                'name' => $faker->name,
                'cpf' => $faker->cpf(false),
                'phone' => $faker->phone,
                'adress' => $faker->streetName,
                'adressNumber' => rand(0, 9999),
                'district' => $faker->firstNameMale,
                'city' => $faker->city,
                'zipCode' => $faker->postcode,
            ], [
                'name' => $faker->name,
                'cpf' => $faker->cpf(false),
            ],               [
                'name' => $faker->name,
                'cpf' => $faker->cpf(false),
                'phone' => $faker->phone,
            ],               [
                'name' => $faker->name,
                'cpf' => $faker->cpf(false),
                'phone' => $faker->phone,
                'adress' => $faker->streetName,
            ],               [
                'name' => $faker->name,
                'cpf' => $faker->cpf(false),
                'phone' => $faker->phone,
                'adress' => $faker->streetName,
                'adressNumber' => rand(0, 9999),
            ],               [
                'name' => $faker->name,
                'cpf' => $faker->cpf(false),
                'phone' => $faker->phone,
                'adress' => $faker->streetName,
                'adressNumber' => rand(0, 9999),
                'district' => $faker->firstNameMale,
            ],               [
                'name' => $faker->name,
                'cpf' => $faker->cpf(false),
                'adress' => $faker->streetName,
                'district' => $faker->firstNameMale,
                'city' => $faker->city,
                'zipCode' => $faker->postcode,
            ],

        ];


            DB::table('employees')->insert([
                $randomPerson[rand(0, 6)]
            ]);
        }
    }
}
