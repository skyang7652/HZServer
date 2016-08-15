@extends('layouts.master')

@section('content')


   <form action = "{{url('api/pay/insert')}}" method = "POST" >
       
 
    <table border="1" style="width:50%" align = 'center'>
        <tr>
            <td>
                <select name ="employee_Id" class = "selectEmployee">

                </select>
            </td>
        </tr>
        <tr>
            @inject('PayPresenter','HZ\Presenters\PayPresenter')
            <td>
                <label for="date">工作日期</label>
            </td>

            <td>
               <input type="text" name="date" class ="date"  value = "{{$PayPresenter->getDate()}}"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="AMPos">上午地點</label>
            </td>
            <td>
                <select name = "amLocation_Id" class = "AmLoaction">
                     @foreach($bid as $var)
                               <option value="{{$var->bid_Id}}">{{$var-> bidName}}</option>
                     @endforeach
                </select> 
            </td>
        </tr>
        <tr>
            <td>
                <label for="AM">上午時數</label>
            </td>
            <td>
                <select name ="amTime" class ="amTime">
                 @for($i = 0; $i < 5 ;$i++)
                    @if($i === 4)
                        <option value = "{{$i}}" SELECTED> {{$i}}</option>
                    @else
                        <option value = "{{$i}}"> {{$i}}</option>
                    @endif
                 @endfor
                </select>
            </td>
        </tr>
        <tr>
            <td>
                 <label for="amm">上午薪資</label>
            </td>
            <td>
                <input type="number" name="amMoney" class ="amMoney" readonly="readonly"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="pmPos"> 下午地點</label>
            </td>
            <td>
                <select name = "pmLocation_Id" class = "pmLoaction">
                      @foreach($bid as $var)
                               <option value="{{$var->bid_Id}}">{{$var-> bidName}}</option>
                      @endforeach
                </select> 
            </td>
        </tr>
         <tr>
            <td>
                <label for="PM">下午時數</label>
            </td>
            <td>
                <select name ="pmTime" class ="pmTime">
                 @for($i = 0; $i < 5 ;$i++)
                    @if($i === 4)
                        <option value = "{{$i}}" SELECTED> {{$i}}</option>
                    @else
                        <option value = "{{$i}}"> {{$i}}</option>
                    @endif
                 @endfor
                </select>
            </td>
        </tr>
        <tr>
            <td>
                 <label for="pmm">下午薪資</label>
                
            </td>
            <td>
                
                <input type="number" name="pmMoney" class ="pmMoney" readonly="readonly"/>
            </td>
            
        </tr>
        
         <tr>
            <td>
                <label for="otPos"> 加班地點</label>
            </td>
            
            <td>
                <select name = "otLocation_Id" class = "otLoaction">
                   @foreach($bid as $var)
                               <option value="{{$var->bid_Id}}">{{$var-> bidName}}</option>
                     @endforeach
                </select> 
            </td>
        </tr>
        
        
         <tr>
            <td>
                
                <label for="ot">加班時數</label>
                
            </td>
            
            <td>
                <select name ="otTime" class ="otTime">
                 @for($i = 0; $i < 7 ;$i++)
                        <option value = "{{$i}}"> {{$i}}</option>
                 @endfor
                </select>
            </td>
        </tr>
        <tr>
            <td>
                 <label for="otm">加班薪資</label>
            </td>
            <td>
                <input type="number" name="otMoney" class ="otMoney" value = "0" readonly="readonly"/>
            </td>
            
        </tr>
        
        
        <tr>
            <td>
                 <label for="otm">當日總薪資</label>
            </td>
            <td>
                <input type="number" name="allMoney" class ="allMoney" readonly="readonly"/>
            </td>
            
        </tr>
        <tr>
            <td>
                <div>
                   <input type="submit" class = "btn btn-default" role = "btn" value="提交">
                </div>
            </td>
           
        </tr>
    </table>
    
</form>
       
@endsection


@section('scripts')

<script>
    var myData;
    var pay;
    var otPay;
    $(document).ready(function() {
        
        $.ajax({
            type: "POST",
            url: '/pay/getEmployee',
            datatype: "json",
            success: function( msg ) {
               myData = msg;
               pay = myData[0].pay/2;
               otPay = myData[0].overtimePay;
                 $(".amMoney").val(pay); 
                 $(".pmMoney").val(pay);
                 $(".otMoney").val(0);
                 $(".allMoney").val(pay * 2);
                 var $select = $('.selectEmployee'); 
        
                    $.each(myData, function(i, v) {
                    $select.append('<option value=' + v.employee_Id + '>' + v.lastName + v.firstName  +'</option>');
                 });
            }
        });

    });
    
    $(".selectEmployee").change(function(){
       
       var index = $(".selectEmployee").val();
       
       console.log(index);
       
       $.each(myData, function(i, v) {
                if (v.employee_Id == index) {
                    pay = v.pay/2;
                    otPay = v.overtimePay;
                return;
        }
     });
       
        $(".amMoney").val(pay);
        $(".pmMoney").val(pay);
        $(".otMoney").val(0);
        $('.amTime option:eq(4)').attr('selected',true);
        $('.pmTime option:eq(4)').attr('selected',true);
        $('.otTime option:eq(0)').attr('selected',true);
        $(".allMoney").val(pay * 2);
    });
    
    
    $(".amTime").change(function() {
        
        var time = $(".amTime").val();
        
        $(".amMoney").val( (time * pay / 4));
        
        var amMoney = $(".amMoney").val();
        var pmMoney = $(".pmMoney").val();
        var otMoney = $(".otMoney").val();

 
          $(".allMoney").val(parseInt (amMoney) +parseInt ( pmMoney) +parseInt (otMoney));
    });
    
    
     $(".pmTime").change(function() {
        
        var time = $(".pmTime").val();
        
        $(".pmMoney").val((time * pay / 4));
        
        var amMoney = $(".amMoney").val();
        var pmMoney = $(".pmMoney").val();
        var otMoney = $(".otMoney").val();

          $(".allMoney").val(parseInt (amMoney) +parseInt ( pmMoney) +parseInt (otMoney));
    });
    
    $(".otTime").change(function() {
        
        var time = $(".otTime").val();
        
        $(".otMoney").val((parseInt(time) * otPay));
        
        var amMoney = $(".amMoney").val();
        var pmMoney = $(".pmMoney").val();
        var otMoney = $(".otMoney").val();

          $(".allMoney").val(parseInt (amMoney) +parseInt ( pmMoney) +parseInt (otMoney));
    });
    
    
    
    
</script>
@endsection