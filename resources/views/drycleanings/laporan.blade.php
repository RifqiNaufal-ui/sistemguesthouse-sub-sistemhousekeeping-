<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
		table.static {
			position: relative;
			/* left: 3% */
			border: 1px solid #543535;
		}

	</style>
	<title>Proses In/Out Laundry atau Dry Cleaning</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
		<div class="form-group">
		<div class="row">
		<div class="col-md-12">
			<table class="table table-hover">
				 @foreach($drycleanings as $data)
				<tbody>
					<tr>
						<td>Name :		{{ $data->name }}</td>
					
						<td>Date :		{{ date('d F Y',strtotime($data->date)) }}</td>
					</tr>
					<tr>
						<td>Room No. :		{{$data->room->numberRoom}}</td>
					
						<td>Time :		{{ date('H:i:s',strtotime($data->created_at)) }}</td>

						<th>Please Dial 6</th>
					</tr>
				</tbody>
				@endforeach
			</table>			
			<table class="table table-hover">
				<tbody>
				<tr>
					<h10><center>No Collection  after 10.00 AM.</center></h10>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
			<table class="static" align="center" rules="all" border="1px" style="width: 95%;">
				<tr>
		            <th><center>No</center></th>
                    <th><center>Product Name</center></th>
                    <th><center>Quantity</center></th>
                    <th><center>Price</center></th>
                    <th><center>Amount</center></th>
		        </tr>
		        @foreach($drycleaning_details as $data)
		        <tr>
		        	<td><center>{{ $loop->iteration }}</center></td>
                    <td><center>{{ $data->package->name }}</center></td>
                    <td><center>{{ $data->quantity }}</center></td>
                    <td><center>Rp. {{ number_format ( $data->unitprice,0) }}</center></td>
                    <td><center>Rp. {{ number_format ( $data->amount,0) }}</center></td>
		        </tr>
		        @endforeach
		        @foreach($drycleanings as $data)
		        <tr style="background-color: yellow;">
		        	<td><center></center></td>
		        	<td><center></center></td>
		        	<td><center></center></td>
		        	<td><center><b>Total :</b></center></td>
                    <td><center><b>Rp. {{ number_format ( $data->total,0) }}</b></center></td>
		        </tr>
		        @endforeach
			</table>
		</div>
		<script type="text/javascript">
			window.print();
		</script>
		<table class="table table-hover">				
			<tr>
		        <th><center>YOUR ACCOUNT IS AUTOMATICALLY CHARGED AT F.O. CASHIER,
		        PLEASE DO NOT PAY UPON DELIVARY</center></th>
			</tr>
			</table>
			<table class="table table-hover">				
			<tr>
		        <h10><center>Any claim concerning the finished articles must be reported with this list within 24 hours of delivery. The guest house not be responsible for loss of button and ornaments or thingss left in The pockets of garment. Liability of loss or damage of an article is limited to 5 times the service charge for each item</center></h10>
		</tr>
			</table>
			<tr></tr>
		<table class="table table-hover">
				<tbody>
					<tr>
						<th>Guest's Signature :</th>
						<th></th>

						<th>Checkes by :</th>
						<th></th>
					</tr>
				</tbody>
			</table>				
		</table>
</body>
</html>