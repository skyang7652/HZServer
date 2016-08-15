@extends('layouts.master')

@section('content')

<table border="1" style="width:50%" align = 'center' >
    <tr>
        <td>
             <div class='centered' style ="padding:10px 10px;">

               {{ Form::open() }}

               {{ Form::label('lastName','姓氏：')}}
               {{ Form::label('lastName',$querys->lastName) }}<br>
               
               {{ Form::label('firstName','名字：') }}
               {{ Form::label('firstName',$querys->firstName) }}<br>
               
               {{ Form::label('pay','薪資：') }}
               {{ Form::label('pay',$querys->pay)}}<br>
               
               {{ Form::label('overtimePay','加班：') }}
               {{ Form::label('overtimePay',$querys->overtimePay,array('min'=>'0'))}}<br>
               
               {{ Form::label('phone','電話：') }}
               {{ Form::label('phone',$querys->phone) }}<br>
               
               {{ Form::label('address','地址：') }}
               {{ Form::label('address',$querys->address) }}<br>
               {{ Form::close()}}
        
        </div>
            
        </td>
       
    </tr>
</table>
@endsection