<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(Category::class);
        $this->call(SubCategory::class);
        $this->call(Sellers::class);
        $this->call(EstatesForTest::class); //JUST FOR LOCAL TEST
        $this->call(EmployeeForTest::class); //JUST FOR LOCAL TEST
    }
}
