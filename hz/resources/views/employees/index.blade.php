@extends('layouts.master')

@section('content')

<div class = "centered">
    
    <table  border="0" style="width:50%" align = 'center'>
        <tr>
            <td  width="80%"align = 'center'> 
                    {!! Form::open(array('method' => 'get','route'=>'employee.search'))!!} <!--太詭異了-->
                    {!! Form::text('qChar') !!}
                    {!! Form::button('查詢',array('role' => 'btn', 'class' => 'btn btn-info btn-sm','type' => 'submit')) !!}
                    {!! Form::close() !!}
            </td>
             <td width="20%" align = 'right'>
                <a href="{{url('employee/create')}}" role = "btn" class = "btn btn-primary">新增</a>
            </td>
        </tr>
    </table>
        
        <table border="0" class = "table table-hover" style="width:50%" align = 'center'>
          
        <thead>
          <tr>
            <td width="30%" id = "emtb">姓名</td>
            <td width="20%" id = "emtb">薪資</td>
            <td width="20%" id = "emtb">加班薪資</td>
            <td width="10%"></td>
            <td width="10%"></td>
            <td width="10%"></td>
            <td width="10%"></td>
          </tr>
        </thead>
        @inject('EmployeeP','HZ\Presenters\EmployeeP')
        <tbody>
        @foreach($querys as $var)
        <tr>
            {!!$EmployeeP->showEmployee($var)!!}
            <td width="10%">
                 <a href="{{url('pay/retrieval/'.$var->employee_Id)}}" role='btn' class = 'btn btn-default btn-sm'>薪資單</a>
            </td>
            <td width="10%">
               <a href="{{url('employee/'.$var->employee_Id)}}" role='btn' class = 'btn btn-default btn-sm'>詳細</a>
            </td>
            <td width="10%"><a href="{{url('employee/'.$var->employee_Id.'/edit')}}" role='btn' class = 'btn btn-info btn-sm'>編輯</a></td>
            <td width="10%">
                {{ Form::open(array('method'=>'DELETE' , 'route' => array('employee.destroy',$var->employee_Id))) }}
                {{ Form::button('刪除',array('class' =>'btn btn-danger btn-sm','role'=>'btn' , 'type' => 'submit')) }}
                {{ Form::close()}}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    
</div>


@endsection