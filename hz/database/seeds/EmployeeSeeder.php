<?php

use Illuminate\Database\Seeder;
use  HZ\Employee;


class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $employee = new Employee;
        $employee->lastName = '楊';
        $employee->firstName = '盛凱';
        $employee->pay = 1500;
        $employee->overtimePay = 250;
        $employee->phone = '0972004091';
        $employee->address = '善化';
        $employee->save();
        
        $employee = new Employee;
        $employee->lastName = '楊';
        $employee->firstName = '博安';
        $employee->pay = 1600;
        $employee->overtimePay = 250;
        $employee->phone = '0911650515';
        $employee->address = '善化';
        $employee->save();
        
        
 
    }
}
