<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use HZ\Bid;
class ApiBidController extends Controller
{
    public function bidNew(Request $request)
    {
       /* $bid = new Bid;
        $bid->bidName = $request['bidName'];
        $bid->bidMoney = $request['bidMoney'];
        $bid->bidbond = $request['bidBond'];
        $bid->startDate = $request['startDate'];
        $bid->endDate = $request['endDate'];
        $bid->bidType =$request['bidType'];
        $bid->save();*/
        
        Bid::create($request->all());

         $ret = "{\"type\":\"E000\",\"message\":\"Success\"}";

        return $ret;
        
    }

    public function bidUpdate(Request $request)
    {
        $bid_Id = $request['bid_Id'];

        $bid = Bid::findOrFail($bid_Id);

        $bid->bidName = $request['bidName'];
        $bid->bidAbbreviation = $request['bidAbbreviation'];
        $bid->bidMoney = $request['bidMoney'];
        $bid->bidBond = $request['bidBond'];
        $bid->startDate = $request['startDate'];
        $bid->endDate = $request['endDate'];
        $bid->bidType = $request['bidType'];
        $bid->save();

         $ret = "{\"type\":\"E000\",\"message\":\"Success\"}";

        return $ret;
    }

     public function getBidName($type)
    {
        
        if($type == 0){
                    $bid = Bid::where('bidType','0')->get();

        } else {
                     $bid = Bid::all();
           
        }       
    	 return $bid;
 	}   	

    public function getBidNameOne($id)
    {
        $bid = Bid::where('bid_Id',$id)->get();
        return $bid[0];

    }
    public function bidDelete(Request $request)
    {
        Bid::destroy($request['bid_Id']);
        $ret = "{\"type\":\"E000\",\"message\":\"Success\"}";
        return $ret;
    }
}
