@extends('layouts.master')

@section('content')
    <table table border="0" style="width:50%" align = 'center' >
        <div class="centered">
            <tr>
                <td>
                    <a href="{{url('employee')}}" role = "btn" class = "btn btn-default">員工</a>
                </td>
                <td>
                    <a href="{{url('bid')}}" role = "btn" class = "btn btn-default">標案</a>
                </td>
            </tr>
            
            <tr>
                <td>
                     <a href="{{url('pay')}}" role = "btn" class = "btn btn-default">薪資</a>
                </td>
            </tr>
           <!--- <tr>
                <td>
                    <form action="{{url('api/pay/updatePay')}}" method="POST" accept-charset="utf-8">
                                
                                <input type="hidden" name = "pay_Id" value="39"></input>
                                <input type="hidden" name = "allMoney" value="1725 "></input>
                                <input type="hidden" name = "am_Id" value="100"></input>
                                <input type="hidden" name = "amTime" value="4"></input>
                                <input type="hidden" name = "amLocation_Id" value="4"></input>
                                <input type="hidden" name = "amMoney" value="575"></input>
                                <input type="hidden" name = "pm_Id" value="101"></input>
                                <input type="hidden" name = "pmTime" value="4"></input>
                                <input type="hidden" name = "pmLocation_Id" value="4"></input>
                                <input type="hidden" name = "pmMoney" value="575"></input>
                                <input type="hidden" name = "ot_Id" value="102"></input>
                                <input type="hidden" name = "otTime" value="4"></input>
                                 <input type="hidden" name = "otLocation_Id" value="4"></input>
                                <input type="hidden" name = "otMoney" value="575"></input>
                                <input type="submit" name = "test"></input>
                    </form>

                </td>
                !-->
            </tr>
        </div>
    </table>

@endsection