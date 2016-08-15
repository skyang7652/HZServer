<?php

namespace HZ;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Bonus extends Model
{
   use SoftDeletes;

   	protected $table = "bonus";
    protected $primaryKey = "bonus_Id";
    
    public function Employee(){
      return  $this->belongsTo('HZ/Employee');
    }
}
