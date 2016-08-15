<?php

namespace HZ;

use Illuminate\Database\Eloquent\Model;

class DetailPay extends Model
{
   public $table = "detailPay";
   protected $primaryKey = 'detailPay_Id';
    
     public function Pay (){
       
       return $this->belogsTo('HZ/Pay');
   }
}
