<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;
use HZ\Bid;
use DB;
class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function complete($id){
        
        $bid = Bid::findOrFail($id);
        
        $bid->bidType = true;
        $bid->save();
        
        return redirect('bidpage/bid ');
        
        
    }
    
    public function index()
    {
       $querys = Bid::all();

       return view ('bids.bidIndex',compact('querys'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('bids.bidCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        
        return redirect('bidpage/bid');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$querys= Bid::findOrFail($id);
        
        $querys = DB::table('bid')
                    ->where('bid_Id',$id)
                    ->first();
                    
       // return $querys;
        return view('bids/bidShow',compact('querys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $querys = DB::table('bid')
                    ->where('bid_Id',$id)
                    ->first();
                    
       // return $querys;
        return view('bids/bidEdit',compact('querys'));
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
        
       // return $request['bidType'];
        $querys = Bid::findOrFail($id);
        $querys->bidName = $request['bidName'];
        $querys->bidMoney = $request['bidMoney'];
        $querys->bidBond = $request['bidBond'];
        $querys->startDate = $request['startDate'];
        $querys->endDate = $request['endDate'];
        $querys->bidType = $request['bidType'];
        $querys->save();
        
       return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    

}
