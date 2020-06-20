<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class EmployeeModel extends Model
{
    use SoftDeletes;

    protected $table = 'employees';
    protected $fillable = ['name'];
    private $email;
    private $phone;
    private $adress;
    private $adressNumber;
    private $adressNumberInfo;
    private $district;
    private $city;
    private $zipCode;


    public function estate()
    {
        return $this->hasMany('App\EstateModel', 'foreign_key');
    }

}
