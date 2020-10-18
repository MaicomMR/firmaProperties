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
        $this->call(DefaultValue::class);
        $this->call(EmployeeForTest::class); //JUST FOR LOCAL TEST
        $this->call(UserForTest::class); //JUST FOR LOCAL TEST
        $this->call(EstatesForTest::class); //JUST FOR LOCAL TEST
    }
}
