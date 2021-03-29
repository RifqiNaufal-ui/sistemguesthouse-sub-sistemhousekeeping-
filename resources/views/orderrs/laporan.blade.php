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
	<title>Mini Bar Sales Report</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
		<div class="form-group">
			<p align="center"><b>Mini Bar Sales Report</b></p>
			 <table class="table table-hover">
			 	 @foreach($orderr as $data)
                <tbody>
                    <tr>
                        <td>Customer Name :		<b>{{ $data->name }}</b></td>

						<td>Customer Room :		<b>{{$data->room->numberRoom}}</b></td>
                    </tr>
                    <tr>                     
                        <td>Department :	<b>{{ $data->department }}</b></td>

						<td>Date :	<b>{{ date('d F Y',strtotime($data->date)) }}</b></td>
                    </tr>
                </tbody>
                @endforeach
            </table>
			<table class="static" align="center" rules="all" border="1px" style="width: 95%;">
				<tr>
		            <th><center>No</center></th>
                    <th><center>Product Name</center></th>
                    <th><center>Quantity</center></th>
                    <th><center>Price</center></th>
                    <th><center>Amount</center></th>
		        </tr>
		        @foreach($orderrdetails as $data)
		        <tr>
		        	<td><center>{{ $loop->iteration }}</center></td>
                    <td><center>{{ $data->product->name }}</center></td>
                    <td><center>{{ $data->quantity }}</center></td>
                    <td><center>Rp. {{ number_format ( $data->unitprice,0) }}</center></td>
                    <td><center>Rp. {{ number_format ( $data->amount,0) }}</center></td>
		        </tr>
		        @endforeach
		        @foreach($orderr as $data)
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
</body>
</html>