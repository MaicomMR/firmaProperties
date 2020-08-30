<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlertValuesModel extends Model
{
    protected $table = 'admin_config_values';

    protected $fillable = [
        'write_off_value_alert',
        'day_write_off_value_alert',
        'month_write_off_value_alert'
    ];
}
