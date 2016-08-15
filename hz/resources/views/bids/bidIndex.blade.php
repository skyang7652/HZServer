@extends('layouts.master')

@section('content')


<div class = "centered">
    
    <table  border="0" style="width:50%" align = 'center'>
        <tr>
            <form>
            <td  width="80%"align = 'center'> 
               {{ Form::open(array('method' => 'POST','route' =>'bid.index'))}}
               {{ Form::text('qChar') }}
               {{ Form::button('查詢',array('class' =>'btn btn-danger btn-sm','role'=>'btn' , 'type' => 'submit')) }}
               {{ Form::close()}}
            </td>
             </form>
             <td width="20%" align = 'right'>
                <a href="{{ route('bid.create')}}" role = "btn" class = "btn btn-primary">新增</a>
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
        @inject('BidPresenter','HZ\Presenters\BidPresenter')
        @foreach($querys as $var)
        <tr>
            <td width="60%"  id = "bidtb">{{$var->bidName}}</td>
            
            <td width="10%">
                <a href="{{url('bid/'.$var->bid_Id)}}" role='btn' class = 'btn btn-default btn-sm'>詳細</a>
            </td>
            
            <td width="10%">
              
              {{ Form::open(array( 'route' => array('branch.index',$var->bid_Id))) }}
              {{ Form::button('支線',array('role' => 'btn', 'class' => 'btn btn-info btn-sm','type' => 'submit')) }}
              {{ Form::close() }}
              
            </td>
            
            <td width="10%">
                <a href="#" role='btn' class = 'btn btn-danger btn-sm'>刪除</a>
            </td>
            
            <td width="10%" style"padding:10px 10px;">
                
                @if($var->bidType)
                <div style="border:2px #f00 solid;border-radius:10px;background-color:#0f0;">
                        已結案
                </div>
                @else
                {{ Form::open(array('method' => 'GET','route'=>array('bid.complete',$var->bid_Id)))}}
                {{ Form::button('結案',array('role' => 'btn', 'class' => 'btn btn-info btn-sm','type' => 'submit')) }}
                {{ Form::close() }}
               
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    
</div>





@endsection