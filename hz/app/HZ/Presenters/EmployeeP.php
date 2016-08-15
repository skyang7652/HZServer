<?php

namespace HZ\Presenters;


class EmployeeP {
    
    protected $msg;
    
     public function showEmployee($var){
         
       
        return '<td width="30%"  id = "emtb">'.$var->lastName.  $var->firstName.'</td>
                <td width="20%"  id = "emtb">'.$var->pay.'</td>
                <td width="20%"  id = "emtb">'.$var->overtimePay.'</td>
                ';
         
         
     }
    
    
    
}