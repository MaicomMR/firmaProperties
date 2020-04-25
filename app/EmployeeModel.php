<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class EmployeeModel extends Model
{
    use SoftDeletes;

    protected $table = 'employees';
    protected $fillable = ['name'];


}
