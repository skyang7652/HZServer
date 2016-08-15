<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use HZ\Employee;
use DB;
use View;
use HZ\Repositories\EmployeeR;

class EmployeeController extends Controller
{
    protected $EmployeeR;
    
    public function __construct(EmployeeR $EmployeeR){
        $this ->EmployeeR =$EmployeeR;
    }

   
   public function search(Request $request)
   {
                    
      $querys = $this->EmployeeR->searchEmployee($request['qChar']);
      return view('employees.index',compact('querys'));
      
       
       
   }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $querys = $this->EmployeeR->getEmployeeAll();
        //return $querys;
        return view('employees.index',compact('querys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $employee = new Employee;
       
       $employee->lastName = $request['lastName'];
       $employee->firstName = $request['firstName'];
       $employee->pay = $request['pay'];
       $employee->overtimePay = $request['overtimePay'];
       $employee->phone = $request['phone'];
       $employee->address = $request['address'];
       $employee->save();
        return redirect('employee');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $querys = $this->EmployeeR->getEmployee($id);
         
         return View::make('employees.show',compact('querys'));
          
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $querys = $this->EmployeeR->getEmployee($id);
        return View::make('employees.edit',compact('querys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        
        $employee->lastName = $request['lastName'];
        $employee->firstName = $request['firstName'];
        $employee->pay = $request['pay'];
        $employee->overtimePay = $request['overtimePay'];
        $employee->phone = $request['phone'];
        $employee->address = $request['address'];
        $employee->save();
        
        
        return redirect('employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);
        
        return redirect('employee');
    }
    

  

}
