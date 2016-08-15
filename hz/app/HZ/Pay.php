<?php

namespace HZ;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pay extends Model
{
    use SoftDeletes;
    protected $table = "pay";
    protected $primaryKey = 'pay_Id';
   
   public function detailPay(){
       
       return $this->hasMany('HZ\DetailPay');
   }
    //
}
