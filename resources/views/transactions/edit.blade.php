@extends('layouts.master')
 
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
  function totalAmount()
  {
    var t=0;
    $('.amount').each(function(i,e)
      {var amt=$(this).val()-0;t+=amt;
      });
    $('.total').html(t);
    $('.total1').val(t);
  } 
  $(function()
    {
    $('.getmoney').change(function()
      {
        var total=$('.total').html();
        var getmoney=$(this).val();
        var t=getmoney-total;
        $('.backmoney').val(t).toFixed(2);});
    $('.add').click(function()
      {
        var package=$('.package_id').html();
        var n=($('.neworderbody tr').length-0)+1;

  var tr='<tr>'+n+
    ''+
    '<td><select class="form-control package_id" name="package_id[]" required="">'+package+'</select></td>'+
    '<td><input type="number" class="qty form-control" name="qty[]" value="{{ old(' email') }}" required=""></td>'+
    '<td><input type="number" class="price form-control" name="price[]" value="{{ old(' email') }}"></td>'+
    '<td><input type="number" class="dis form-control" name="dis[]" required=""></td>'+
    '<td><input type="number" class="amount form-control" name="amount[]"></td>'+
    '<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
      $('.neworderbody').append(tr);
  });

  $('.neworderbody').delegate('.delete','click',function()
  {
      var last=$('.neworderbody tr').length;
        if(last==1){
            alert("you can not remove last row");
        }
        else{
    $(this).parent().parent().remove();
    totalAmount();
    }
  });

  $('.neworderbody').delegate('.package_id','change',function()
  {
    var tr=$(this).parent().parent();
    var price=tr.find('.package_id option:selected').attr('data-price');
    tr.find('.price').val(price);
    var qty=tr.find('.qty').val()-0;
    var dis=tr.find('.dis').val()-0;
    var price=tr.find('.price').val()-0;
    var total=(qty*price)-((qty*price*dis)/100);
    tr.find('.amount').val(total);
    totalAmount();
  });

  $('.neworderbody').delegate('.qty , .dis','keyup',function()
  {
    var tr=$(this).parent().parent();
    var qty=tr.find('.qty').val()-0;
    var dis=tr.find('.dis').val()-0;
    var price=tr.find('.price').val()-0;
    var total=(qty*price)-((qty*price*dis)/100);
    tr.find('.amount').val(total);
    totalAmount();
  });

  $('#hideshow').on('click',function(event)
  {
    $('#content').removeClass('hidden');
    $('#content').addClass('show');
    $('#content').toggle('show');
  });
  });
  </script> 
  <style>.hidden{display:none}.show{display:block !important}select.form-control.package_id{width:300px}
  </style> 
  <script>function printPage(id)  
  {
    var html="<html>";
    html+=document.getElementById(id).innerHTML;
    html+="</html>";
    var printWin=window.open('','','left=0,top=0,width=300,height=300,toolbar=0,scrollbars=0,status =0');
      printWin.document.write(html);
      printWin.document.close();
      printWin.focus();
      printWin.print();
      printWin.close();
  }
  </script>
  <script>
        function portPage(id)
        {
          var html="<html>";
            html+=document.getElementById(id).innerHTML;
            html+="</html>";
          var printWin=window.open('','','left=0,top=0,width=300,height=300,toolbar=0,scrollbars=0,status =0');
            printWin.document.write(html);
            printWin.document.close();
            printWin.focus();
            printWin.print();
            printWin.close();
        }
  </script>

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <a href="{{ url('transactions') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Back</a>
                    
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
            </div>

    <div class="box-body">
  
    <form class="form-horizontal" id="yoyo" role="form" method="POST" action="{{ route('transactions.update', $transactions->id) }}">
  
    {!! csrf_field() !!}
    {{ method_field('PUT') }}
    
    <div class="box-body">
    <div class="row">
    <div class="col-md-12">
    <div class="form-group">
    <tr>
      <td>Customer Name
      <select class="form-control select2" name="customer_id" value="{{ old('customer_id') }}" required="">
        <option value="{{ $transactions->customer->id }}">{{ $transactions->customer->name }}</option>
        <option>-- Select Customer Name --</option>
        @foreach($customers as $cs)
        <option value="{{ $cs->id }}">{{ $cs->name }}</option>
        @endforeach
      </select></td>
      <td>Date <input type="date" class="form-control" name="date" value="{{ $transactions->date }}" required=""></td>
      </tr>
      </div>
      </div>
      </div>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Package Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Discount</th>
          <th>Amount</th>
          <!-- <th> 
            <input type="button" class="btn btn-sm rounded-circle btn-primary add" value="+">
          </th> -->
        </tr>
      </thead>
      <tbody class="neworderbody">
       @foreach($transactions->transaction_details as $data)
       <input type="hidden" name="idDetailTransactions[]" value="{{ $data->id }}">
        <tr>
            <td>
              <select class="form-control package_id" name="package_id[]" required="">
                <option value="{{ $data->package->id }}">{{ $data->package->name }}</option>
                <option>-- Select Package Name --</option>
                  @foreach($packages as $package)
                    <option data-price="{!! $package->price !!}" value="{!! $package->id !!}">{!! $package->name!!}
                    </option>
                   @endforeach
              </select>
            </td>
            <td>
              <input type="number" class="qty form-control" name="qty[]" value="{{ $data->quantity }}" required="">
            </td>        
            <td>
              <input type="number" class="price form-control" name="price[]" value="{{ $data->unitprice }}">
            </td>
            <td>
              <input type="number" class="dis form-control" name="dis[]" value="{{ $data->discount }}" required="">
            </td>
            <td>
              <input type="number" class="amount form-control" name="amount[]" value="{{ $data->amount }}">
            </td>
            <!-- <td>
              <input type="button" class="btn btn-sm rounded-circle btn-danger delete" value="X">
            </td> -->
        </tr>
        @endforeach
      </tbody>
  </table>
  <div class="display-4 bg-danger text-white p-2">
    <p>Total : <b class="total">{{ $transactions->total }}</b></p>
    <input type="hidden" name="total" class="total1">
  </div>
  <hr>
  <td>Payment <input type="number" class="getmoney form-control" name="getmoney" value="{{ $transactions->getmoney }}"></td>
  <td>Change <input type="number" class="backmoney form-control" name="backmoney" value="{{ $transactions->backmoney }}"></td>
  <hr>
  <input type="submit" class="btn btn-primary btn-lg btn-block" name="save" value="Save"> <br/>
  </div>
</form>
</div>
</div>
</div>
</div>
@endsection