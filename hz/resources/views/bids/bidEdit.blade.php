@extends('layouts.master')


@section('content')

         {{ Form::open(['method'=> 'PUT', 'route' => ['bid.update',$querys->bid_Id]])}}


<br>
 <table border="1" style="width:50%" align = 'center' >
          
             
               
            <tr>
                <td>
                    {{ Form::label('labelBidName','標案名稱：') }}
                </td>
                <td>
                    <div class='lefted' style ="padding:5px 5px;">
                         {{ Form::text('bidName',$querys->bidName,array('class' => 'foo')) }}
                     </div>
                </td>
            </tr>
            
            <tr>
                <td>
                        {{ Form::label('labelBidMoney','標案金額：') }}
                </td>
                <td>
                    <div class='lefted' style ="padding:5px 5px;">
                        {{ Form::number('bidMoney',$querys->bidMoney ,array('min'=>'0')) }}
                    </div>
                </td>
            </tr>
              
              
            <tr>
                <td>
                        {{ Form::label('labelBidBond','押標金額：') }}
                </td>
                <td>
                     <div class='lefted' style ="padding:5px 5px;">
                        {{ Form::number('bidBond', $querys->bidBond ,array('min'=>'0')) }}
                    </div>                   
                </td>
            </tr>
                 
              
              <tr>
                <td>
                        {{ Form::label('labelSartDate','起始日期：') }}
                </td>
                <td>
                    <div class='lefted' style ="padding:5px 5px;">
                        {{ Form::text('startDate',$querys->startDate)}}
                    </div>        
                </td>
               </tr> 
               
              
              
              <tr>
                <td>
                    {{ Form::label('labelEndDate','結束日期：') }}
                </td>
                <td>
                    <div class='lefted' style ="padding:5px 5px;">
                      {{ Form::text('endDate',$querys->endDate)}}
                    </div>
                </td>
            </tr>
            
            <tr>
                <td>
                    {{ Form::label('labelEndDate','標案狀態：') }}
                </td>
                <td>
                    <div class='lefted' style ="padding:5px 5px;">
                        @if($querys->bidType == 0)
                          {{ Form::select('bidType',['1'=> '已結案','0' => '未結案'],'0')}}
                        @else
                          {{ Form::select('bidType',['1'=> '已結案','0' => '未結案'],'1')}}
                        @endif
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2" >
                    <div class = 'centered' style = "padding:5px 5px;">
                         {{ Form::submit('修改')}}
                        
                    </div>
                     
                </td>
            </tr>
              
               {{ Form::close()}}
            
</table>

@endsection