<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstateHistoryModel extends Model
{

    use SoftDeletes;

    protected $table = 'estate_history';
    protected $fillable = ['employee_id', 'estate_id', 'assign', 'unassign'];


    public function employee()
    {
        return $this->belongsTo('App\EmployeeModel', 'employee_id')->withTrashed();
    }
    public function estate()
    {
        return $this->belongsTo('App\EstateModel', 'estate_id')->withTrashed();
    }
}
