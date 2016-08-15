<?php

namespace HZ;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Employee extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'employee';
    protected $primaryKey = 'employee_Id';
    
    protected $fillable = ['lastName','firstName','pay','overtimePay','phone','address'];
    
    public function allowance(){
       return  $this->hasMany('HZ\Allowance');
    }

    public function bonus(){
       return  $this->hasMany('HZ\Bonus');
    }
}
