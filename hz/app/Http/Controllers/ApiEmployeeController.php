<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use HZ\Employee;
use App\Http\Requests;
use HZ\Repositories\EmployeeR;
class ApiEmployeeController extends Controller
{ 
	protected $EmployeeR;
    
    public function __construct(EmployeeR $EmployeeR){
        $this ->EmployeeR =$EmployeeR;
    }

    public function employeeNew(Request $request)
    {

       $employee = new Employee;

       $employee->lastName = $request['lastName'];
       $employee->firstName = $request['firstName'];
       $employee->pay = $request['pay'];
       $employee->overtimePay = $request['overtimePay'];
       $employee->phone = $request['phone'];
       $employee->address = $request['address'];
       $employee->save();


       $ret = "{\"type\":\"E000\",\"message\":\"Success\"}";
        return $ret;
        
    }

    public function employeeData()
    {
		$querys = $this->EmployeeR->getEmployeeAll();
        return $querys;
    }


     public function employeeUpdate(Request $request)
    {
        $employee = Employee::findOrFail($request['employee_Id']);
        
        $employee->lastName = $request['lastName'];
        $employee->firstName = $request['firstName'];
        $employee->pay = $request['pay'];
        $employee->overtimePay = $request['overtimePay'];
        $employee->phone = $request['phone'];
        $employee->address = $request['address'];
        $employee->save();
        
         $ret = "{\"type\":\"E000\",\"message\":\"Success\"}";
        return  $ret ;
    }


    public function employeeDelete(Request $request)
    {
        Employee::destroy($request['employee_Id']);

         $ret = "{\"type\":\"E000\",\"message\":\"Success\"}";
        
        return $ret;
    }
    public function getEmployee($id){
      $employee = Employee::findOrFail($id);
      return $employee;
    }
}
