<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\ValidationException;
use App\Http\Requests;
use HZ\Employee;
use HZ\Pay;
use HZ\DetailPay;
use HZ\Allowance;
use HZ\Bonus;
use Carbon\Carbon;
class ApiPayController extends Controller
{
    
    public function insert(Request $request){

        /*  $v1 = Validator::make($request->all(), [
            'employee_Id' => 'unique:pay,employee_Id',          
          ]);
          $messages = ['unique' => '已新增相同日期的薪資!!'];
          $v2 = Validator::make($request->all(), [           
            'date' => 'unique:pay,date',            
          ],$messages);
       
        if($v1 ->fails() && $v2 ->fails()){

            $mes =  $v2->errors()->all();
            $ret = "{\"type\":\"E001\",\"message\":\"". $mes[0]."\"}";
            return  $ret;
        }*/

        $testPay = Pay::where('employee_Id',$request['employee_Id'])->where('date',$request['date'])->get();
         //return  $testPay;
        if($testPay != "[]"){
             $ret = "{\"type\":\"E001\",\"message\":\"有相同資料\"}";
            return  $ret;
        }
        
        $pay = new Pay();
        
        $pay->employee_Id = $request['employee_Id'];
        $pay->date = $request['date'];
        $pay->money = $request['allMoney'];
        $pay->payType = false;
        $pay->save();
        
        $pay = Pay::where('employee_Id',$request['employee_Id'])
                    ->where('date',$request['date'])->first();
        $detailPay = new DetailPay();
        $detailPay->pay_Id = $pay->pay_Id;
        $detailPay->timeSegment = 0;
        $detailPay->time = $request['amTime'];
        $detailPay->bid_Id = $request['amLocation_Id'];
        $detailPay->money = $request['amMoney'];
        $detailPay->save();
        
        
        $detailPay = new DetailPay();
        $detailPay->pay_Id = $pay->pay_Id;
        $detailPay->timeSegment = 1;
        $detailPay->time = $request['pmTime'];
        $detailPay->bid_Id = $request['pmLocation_Id'];
        $detailPay->money = $request['pmMoney'];
        $detailPay->save();
        
        $detailPay = new DetailPay();
        $detailPay->pay_Id = $pay->pay_Id;
        $detailPay->timeSegment = 2;
        $detailPay->time = $request['otTime'];
        $detailPay->bid_Id = $request['otLocation_Id'];
        $detailPay->money = $request['otMoney'];
        $detailPay->save();

         $ret = "{\"type\":\"E000\",\"message\":\"Success\"}";

        return $ret;

    }

    public function getPay($id){
        
      $employee = Employee::findOrFail($id);
        
       $pay = Pay::where('employee_Id',$id)
                    ->where('payType',0)
                    ->orderBy('date','asc')
                    ->get();
        
        
        return $pay;       
    }

    public function getPayData($id){
        $pay = Pay::findOrFail($id);

        return $pay;
    }

    public function getDetailPay($id){
               
       $detailPay = DetailPay::where('pay_Id',$id)               
                    ->get();

        return $detailPay;
        
    }

    public function billing(Request $request){
        
        $test = $request->all();
        $employee_Id = $request['employee_Id'];
       $count = $request['aCount'];
       for($i = 0;$i < $count;$i++) {
           $allowance =  new Allowance();
           $allowance->employee_Id =  $employee_Id;
           $allowance->money = $request['aMoney'.$i];
           $allowance->date = Carbon::today();
           $allowance->remark = $request['aTxt'.$i];
           $allowance->save();
       }

       $count = $request['bCount'];
       for($i = 0;$i < $count;$i++) {
           $bonus =  new Bonus();
           $bonus->employee_Id =  $employee_Id;
           $bonus->money = $request['bMoney'.$i];
           $bonus->date = Carbon::today();
           $bonus->remark = $request['bTxt'.$i];
           $bonus->save();
       }

       $pay = Pay::where('employee_Id',$employee_Id)->where('payType','0')->get();

       foreach ($pay as $item) {
           $item->payType = 1;
           $item->save();
       }
       
          $ret = "{\"type\":\"E000\",\"message\":\"Success\"}";
        //  return view('test.test',compact('test'));
          return $ret;
       
    }

    public function updatePay(Request $request)
    {

      //  $test = $request->all();
      // return view('test.test',compact('test'));

        $pay = Pay::findOrFail($request['pay_Id']);

        $pay->money = $request['allMoney'];
        $pay->save();

        $detailPay = DetailPay::findOrFail($request['am_Id']);
        $detailPay->timeSegment = $request['amTime'];
        $detailPay->bid_Id = $request['amLocation_Id'];
        $detailPay->money = $request['amMoney'];
        $detailPay->save();

        $detailPay = DetailPay::findOrFail($request['pm_Id']);
        $detailPay->timeSegment = $request['pmTime'];
        $detailPay->bid_Id = $request['pmLocation_Id'];
        $detailPay->money = $request['pmMoney'];
        $detailPay->save();

        $detailPay = DetailPay::findOrFail($request['ot_Id']);
        $detailPay->timeSegment = $request['otTime'];
        $detailPay->bid_Id = $request['otLocation_Id'];
        $detailPay->money = $request['otMoney'];
        $detailPay->save();

     
         $ret = "{\"type\":\"E000\",\"message\":\"Success\"}";
          return $ret;

    }
    public function deletePay(Request $request)
    {
      $pay_Id = $request['pay_Id'];
      Pay::destroy($pay_Id);
       $ret = "{\"type\":\"E000\",\"message\":\"Success\"}";
        
        return $ret;
    }

}