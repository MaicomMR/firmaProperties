<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstateHistoryModel extends Model
{
    protected $table = 'estate_history';
    protected $fillable = ['name'];


    public function employee()
    {
        return $this->belongsTo('App\EmployeeModel', 'employee_id');
    }
    public function estate()
    {
        return $this->belongsTo('App\EstateModel', 'estate_id');
    }
}
