<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use HZ\Employee;
use HZ\Bid;
use HZ\Pay;
use HZ\DetailPay;
use HZ\Allowance;
use Carbon\Carbon;
class PayController extends Controller
{
    
    public function create(){
        
        //$employee = Employee::all();
        
        $branch = array();
        $bid = Bid::where('bidType','0')->get();
        
     /*   foreach($bids as $bid){
            $branch[] = [
                
               $bid->branch()->get()    
            ];
            
            $branch
        }*/
        //return $branch;
        return view('pays/create',compact('bid'));
    }
    
    public function getEmployee(){
         $employee = Employee::all();
         return $employee;
    }
    
    public function insert(Request $request){
        
        
        $pay = new Pay();
        
        $pay->employee_Id = $request['employee_Id'];
        $pay->date = $request['date'];
        $pay->money = $request['allMoney'];
        $pay->payType = false;
        $pay->save();
        
        $pay = Pay::all()->last();
        
        $detailPay = new DetailPay();
        $detailPay->pay_Id = $pay->pay_Id;
        $detailPay->timeSegment = 0;
        $detailPay->time = $request['amTime'];
        $detailPay->bid_Id = $request['amLocatiom_Id'];
        $detailPay->money = $request['amMoney'];
        $detailPay->save();
        
        
        $detailPay = new DetailPay();
        $detailPay->pay_Id = $pay->pay_Id;
        $detailPay->timeSegment = 1;
        $detailPay->time = $request['pmTime'];
        $detailPay->bid_Id = $request['pmLocatiom_Id'];
        $detailPay->money = $request['pmMoney'];
        $detailPay->save();
        
        $detailPay = new DetailPay();
        $detailPay->pay_Id = $pay->pay_Id;
        $detailPay->timeSegment = 2;
        $detailPay->time = $request['otTime'];
        $detailPay->bid_Id = $request['otLocatiom_Id'];
        $detailPay->money = $request['otMoney'];
        $detailPay->save();

        
        return view('pays/page');
        
    }
    
    
    public function retrieval($id){
        
       $employee = Employee::findOrFail($id);
        
        $pay = Pay::where('employee_Id',$id)
                    ->where('payType',0)
                    ->orderBy('date','asc')
                    ->get();
        
        
        return view ("pays/retrieval",compact('employee','pay'));
        
    }
    
    public function billing(Request $request){
        
        $test  = $request->all();
     /*   
       $count = $request['count'];
       for($i = 1;$i <= $count;$i++) {
           $allowance =  new Allowance();
           $allowance->employee_Id = $request['employee_Id'];
           $allowance->money = $request['money'.$i];
           $allowance->date = Carbon::today();
           $allowance->remark = $request['txt'.$i];
           $allowance->save();
       }*/
       
        
        return view('test.test',compact('test'));
    }
    
}
