<?php

namespace HZ;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Allowance extends Model
{
   use SoftDeletes;
   
    protected $table = 'allowance';
    protected $primaryKey = 'allowance_Id';
    
    
    public function Employee(){
      return  $this->belongsTo('HZ/Employee');
    }
}
