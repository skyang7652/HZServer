@extends('layouts.master')

@section('content')

    <table border="1" style="width:50%" align = 'center' >
    <tr>
        <td>
             <div class='centered' style ="padding:10px 10px;">

               {{ Form::open(array('url' =>'api/bid/new','method' => 'POST'))}}
            
               {{ Form::label('labelBidName','標案名稱：') }}
               {{ Form::text('bidName') }}<br>
               
               {{ Form::label('labelBidMoney','標案金額：') }}
               {{ Form::number('bidMoney'),'value',array('min'=>'0') }}<br>
               
               {{ Form::label('labelBidBond','押標金額：') }}
               {{ Form::number('bidBond'),'value',array('min'=>'0') }}<br>
               
               {{ Form::label('labelSartDate','起始日期：') }}
               {{ Form::text('startDate')}}<br>
               
               {{ Form::label('labelEndDate','結束日期：') }}
               {{ Form::text('endDate')}}<br>
               
               {{ Form::hidden('bidType','false') }}         
               {{ Form::submit('提交')}}
               {{ Form::close()}}
        </div>
            
        </td>
       
    </tr>
</table>
    




@endsection