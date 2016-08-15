<?php

namespace HZ\Presenters;

use Carbon\Carbon;
class PayPresenter{
    
      public function getDate(){

         $today = Carbon::today();
         return $today ->toDateString();
     }
     
     
     public function employeeSelect($employee){
         $ret = '';
         
         $ret = '<select name="employeeSelect" id = "employeeSelect">';
          
         foreach($employee as $var){
             $ret .= '<option value="'.$var->employee_Id.'">'.$var->lastName.$var->firstName.'</option>';
         }
         
        $ret .='</select>';     
         return $ret;
      
     }
     
     public function payList($pay){
         $ret = '';
      
         foreach($pay as $var){
            $ret .='<tr>';
            $ret .='<td>'.$var->date.'</td>';
            $ot = $var->detailPay()->where('timeSegment','=','2')->first();
            $money= $var->money - $ot->money;
            $ret .='<td>'.$money.'</td>';
            
            $ret .='<td>'.$ot->money.'</td>';
            $ret .='</tr>';
         }
         return $ret;
     }
     
     public function allMoney($pay){
         
         $money = 0;
         foreach($pay as $var){
             
             $money += $var->money;
         }
         $ret = '';
         $ret .= '<tr><td>小計</td><td colspan="3">'.$money.'</td></tr>';
         
         return $ret;
     }
     
     
     
     
     
}