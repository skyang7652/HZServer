@extends('layouts.master')


@section('content')



 <table border="0" style="width:50%" align = 'center'>
     <tr>
         <td>
             <div class ="righted" style ="padding:5px 5px;">
                
                 <a href="{{url('bid/'.$querys->bid_Id.'/edit')}}" role ="btn" class="btn btn-default"> 修改 </a>
                 
             </div>
         </td>
         <td>
                  {{ Form::open(array( 'route' => array('branch.index',$querys->bid_Id))) }}
                  {{ Form::button('支線',array('role' => 'btn', 'class' => 'btn btn-info btn-sm','type' => 'submit')) }}
                  {{ Form::close() }}
         </td>
     </tr>
 </table>
 
 {{ Form::open()}}
<br>
 <table border="1" style="width:50%" align = 'center' >
           
            <tr>
                <td>
                    {{ Form::label('labelBidName','標案名稱：') }}
                </td>
                <td>
                    <div class='lefted' style ="padding:5px 5px;">
                         {{ Form::label('bidName',$querys->bidName) }}
                     </div>
                </td>
            </tr>
            
            <tr>
                <td>
                        {{ Form::label('labelBidMoney','標案金額：') }}
                </td>
                <td>
                    <div class='lefted' style ="padding:5px 5px;">
                        {{ Form::label('bidMoney' ,$querys->bidMoney) }}
                    </div>
                </td>
            </tr>
              
              
            <tr>
                <td>
                        {{ Form::label('labelBidBond','押標金額：') }}
                </td>
                <td>
                     <div class='lefted' style ="padding:5px 5px;">
                        {{ Form::label('bidBond',$querys->bidBond) }}
                    </div>                   
                </td>
            </tr>
                 
              
              <tr>
                <td>
                        {{ Form::label('labelSartDate','起始日期：') }}
                </td>
                <td>
                    <div class='lefted' style ="padding:5px 5px;">
                        {{ Form::label('startDate',$querys->startDate)}}
                    </div>        
                </td>
               </tr> 
               
              
              
              <tr>
                <td>
                    {{ Form::label('labelEndDate','結束日期：') }}
                </td>
                <td>
                    <div class='lefted' style ="padding:5px 5px;">
                      {{ Form::label('endDate',$querys->endDate)}}
                    </div>
                </td>
            </tr>
               {{ Form::close()}}
            
</table>



@endsection