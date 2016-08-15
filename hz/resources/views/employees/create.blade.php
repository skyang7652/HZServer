@extends('layouts.master')

@section('content')

<table border="1" style="width:50%" align = 'center' >
    <tr>
        <td>
             <div class='centered' style ="padding:10px 10px;">

               {{ Form::open(array('url' =>'employee','method' => 'POST'))}}
               {{ Form::token()}}
               
               {{ Form::label('lastName','姓氏：',array('size'=>'10'))}}
               {{ Form::text('lastName') }}<br>
               
               {{ Form::label('firstName','名字：') }}
               {{ Form::text('firstName') }}<br>
               
               {{ Form::label('pay','薪資：') }}
               {{ Form::number('pay','value',array('min'=>'0'))}}<br>
               
               {{ Form::label('overtimePay','加班：') }}
               {{ Form::number('overtimePay','value',array('min'=>'0'))}}<br>
               
               {{ Form::label('phone','電話：') }}
               {{ Form::text('phone') }}<br>
               
               {{ Form::label('address','地址：') }}
               {{ Form::text('address') }}<br>
               
               {{ Form::submit('提交')}}
               {{ Form::close()}}
        </div>
            
        </td>
       
    </tr>
</table>


@endsection