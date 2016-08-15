@extends('layouts.master')

@section('content')

<div class = "centered">
    
    <table  border="0" style="width:50%" align = 'center'>
        <tr>
              {{Form::open(['method'=>'Get','url' =>'branch/create']) }}
             <td  align = 'center'>
              {{Form::text('branchName') }}
              {{Form::hidden('bid_Id',$id)}}
              {{Form::button('新增',array('role'=>'btn' ,'class' => 'btn btn-default btn-sm','type' =>'submit'))}}
              {{Form::close()}}
            </td>
        </tr>
    </table>
        
        <table border="0" class = "table table-hover" style="width:80%" align = 'center'>
          
        <thead>
          <tr>
            <td width="60%" id = "emtb"></td>
            <td width="10%" id = "emtb"></td>
            <td width="10%" id = "emtb"></td>
            <td width="10%"></td>
            <td width="10%"></td>

          </tr>
        </thead>
        <tbody>
        @foreach($querys as $var)
        <tr>
            <td width="60%"  id = "bidtb">{{$var->branchName}}</td>
       
            <td width="10%">
                 {{ Form::open(['method' => 'DELETE','route' => array('branch.delete',$var->bid_Id,$var->branch_Id)])}}
                 {{ Form::hidden('bid_Id',$var->bid_Id) }}
                 {{ Form::button('刪除',array('role'=>'btn' ,'class' => 'btn btn-danger btn-sm','type' =>'submit'))}}
                 {{ Form::close()}}
            </td>
            <td width="10%"></td>
            <td width="10%"></td>
            <td width="10%"></td>
            
        </tr>
        @endforeach
        </tbody>
    </table>
    
</div>


@endsection