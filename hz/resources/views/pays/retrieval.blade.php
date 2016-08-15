@extends('layouts.master')


@section('content')
  
  @inject('PayPresenter','HZ\Presenters\PayPresenter')
<div class = "centered">
    <div>
       <h1>{{ $employee->lastName.$employee->firstName}} </h1>
    </div>
    <div>
        <table border="0" class = "table table-hover" style="width:50%" align = 'center'>
            <tr>
                <td>日&nbsp&nbsp&nbsp&nbsp期</td>
                <td>日&nbsp&nbsp&nbsp&nbsp薪</td>
                <td>加班薪資</td>
            </tr>
            
                 {!!$PayPresenter->payList($pay)!!}
                
                 {!!$PayPresenter->allMoney($pay)!!}
        </table>
    </div>
    
    <div>
        <form action = "{{url('pay/billing')}}" method = "POST">
             <table border="0" class = "table table-hover" style="width:50%" align = 'center'>
                 <tr>
                <td colspan="4">津貼</td>
                </tr>
                <tr>
                <td colspan="2">金額</td><td colspan="2">備註</td>
                </tr>
                   <tr>
                    <td colspan="4">
                            <div id = "allowance"></div>
                    </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <input type="button" id="btn" value="新增" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <input type="hidden" name="employee_Id" value = "{{$employee->employee_Id}}"/>
                            <input type="hidden" name = "count" id = "count" value = "0"/>
                            <input type="submit" class = "btn btn-primary" role = "btn" value="結算"/>
                        </td>
                        
                    </tr>
                    
                   
              </table>
         </form>
    </div> 
    
    
</div>



@endsection

@section('scripts')
<script>
 var txtId = 1;
   $("#btn").click(function () {
       $("#count").val(txtId);
      $("#allowance").append('<tr id="tr' + txtId + '"><td colspan="2"><input type="number" id = "money" name="money' + txtId + '" /> </td> <td colspan="2"><input type="text"  id ="txt" name="txt' + txtId + '" /> <input type="button" id = "del" value="del" onclick="deltxt('+txtId+')"></td></tr>');
      txtId++;
  });
    
  function deltxt(id) {
      var count = $("#count").val();
      txtId = txtId - 1;
      $("#tr"+id).remove();
      $("#count").val(count - 1);
      for(var i  = id + 1 ; i <= count; i++ ){
          var money = "money" + (i - 1);
          var txt = "txt" + (i - 1);
          var onClick = "deltxt("+(i - 1)+")";
          var tr = "tr" + (i - 1);
          $("#tr"+i).children().children("#money").attr("name", money);
          $("#tr"+i).children().children("#txt").attr("name", txt);
          $("#tr"+i).children().children("#del").attr("onclick",onClick);
          $("#tr"+i).attr('id',tr);
      }
  }
</script>
@endsection