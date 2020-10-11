<?php

use Illuminate\Database\Seeder;

class UserForTest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Exemplerino da Silva',
                'email' => 'teste@teste.com',
                'email_verified_at' => null,
                'password' => bcrypt('123456789'),
                'admin_level' => 1,
                'created_at' => now()->format('Y-m-d H:i:s'),
            ],[
                'name' => 'Fulano Matos de Souza',
                'email' => 'testeb@teste.com',
                'email_verified_at' => null,
                'password' => md5('123456789'),
                'admin_level' => 0,
                'created_at' => null,
            ]
        ]);
    }
}
