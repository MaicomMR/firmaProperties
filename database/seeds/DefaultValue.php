<?php

use Illuminate\Database\Seeder;

class DefaultValue extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('admin_config_values')->insert([
            [
                'write_off_value_alert' => 0,
                'day_write_off_value_alert' => 0,
                'month_write_off_value_alert' => 0,
            ],
        ]);
    }

}
