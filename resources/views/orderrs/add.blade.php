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
				$('.backmoney').val(t).toFixed(2);
			});

		$('.add').click(function()
			{	
				var product=$('.product_id').html();
				var n=($('.neworderbody tr').length-0)+1;
							
	var tr='<tr><td class="no">'+n+
		'</td>'+
		'<td><select class="form-control product_id" name="product_id[]" required="">'+product+'</select></td>'+
		'<td><input type="number" class="qty form-control" name="qty[]" value="{{ old(' email') }}" required=""></td>'+
		'<td><input type="number" class="price form-control" name="price[]" value="{{ old(' email') }}"></td>'+
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

	$('.neworderbody').delegate('.product_id','change',function()
	{
		var tr=$(this).parent().parent();
		var price=tr.find('.product_id option:selected').attr('data-price');
		tr.find('.price').val(price);
		var qty=tr.find('.qty').val()-0;
		var price=tr.find('.price').val()-0;
		var total=(qty*price);
		tr.find('.amount').val(total);
		totalAmount();
	});

$('.neworderbody').delegate('.qty , .price','keyup',function()
{
var tr=$(this).parent().parent();
var qty=tr.find('.qty').val()-0;
var price=tr.find('.price').val()-0;
var total=(qty*price);
tr.find('.amount').val(total);
totalAmount();});

$('#hideshow').on('click',function(event)
{
$('#content').removeClass('hidden');
$('#content').addClass('show');
$('#content').toggle('show');
});
});
</script> 
<style>.hidden{display:none}.show{display:block !important}select.form-control.product_id{width:300px}
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
			printWin.print();printWin.close();
		}
	</script>

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <a href="{{ url('orderrs') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Back</a>
                    
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
	
		
		<form class="form-horizontal" id="yoyo" role="form" method="POST" action="{{ url('orderrs/add') }}">
	
		{!! csrf_field() !!}
	
		<div class="box-body">
            <div class="row">
            <div class="col-md-12">
            <div class="form-group">
            <tr>
				<td>Customer <input type="text" class="form-control" name="name" value="{{ old('name') }}" required=""></td>
                <td>Room</td>
                <select class="form-control select2" name="room_id" value="{{ old('room_id') }}" required="">
                <option>-- Select Room Number --</option>
                @foreach($rooms as $rs)        
                <option value="{{ $rs->id }}">{{ $rs->numberRoom }}</option>
                @endforeach
                </select>
				<td>Department <input type="text" class="form-control" name="department" value="{{ old('department') }}" required=""></td>
				<td>Date <input type="date" class="form-control" name="date" value="{{ old('date') }}" required=""></td>
			</tr>
            </div>
            </div>
            </div>
          </div>
			
		<table class="table table-striped">
			<thead>
				<tr>
					<th>No.</th>
					<th>Product Name</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Amount</th>
					<th> 
						<input type="button" class="btn btn-sm rounded-circle btn-primary add" value="+">
					</th>
				</tr>
			</thead>
			<tbody class="neworderbody">
				<tr>
					<td class="no">1</td>
				<td>
					<select class="form-control product_id" name="product_id[]" required="">
					<option>-- Select Produk Name --</option>
					@foreach($products as $product)
					<option data-price="{!! $product->price !!}" value="{!! $product->id !!}">{!! $product->name!!}
					</option>
					@endforeach
					</select>
				</td>
				<td>
					<input type="number" class="qty form-control" name="qty[]" value="{{ old('email') }}" required="">
				</td>
				<td>
					<input type="number" class="price form-control" name="price[]" value="{{ old('email') }}">
				</td>
				<td>
					<input type="number" class="amount form-control" name="amount[]">
				</td>
				<td>
					<input type="button" class="btn btn-sm rounded-circle btn-danger delete" value="X">
				</td>
			</tr>
		</tbody>
	</table>
	<div class="display-4 bg-danger text-white p-2">
		<p>Total : <b class="total"></b></p>
		<input type="hidden" name="total" class="total1">
	</div>
	<input type="submit" class="btn btn-primary btn-lg btn-block" name="save" value="Save"> <br/>
	</div>
</form>
</div>
</div>
</div>
</div>
@endsection