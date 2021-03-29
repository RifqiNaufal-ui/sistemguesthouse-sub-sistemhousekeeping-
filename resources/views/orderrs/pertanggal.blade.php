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
	<title>Mini Bar Daily Sales Report</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
		<div class="form-group">
			<p align="center"><b>Mini Bar Daily Sales Report</b></p>
			 @foreach ($data as $item)
			 <table class="table table-hover">
                <tbody>
                    <tr>
                        <th><center>Date</center></th>
                        <th><center>:</center></th>
                        <th><center>{{ date('d F Y / H:i:s',strtotime($item->date)) }}</center></th>
                    </tr>
                </tbody>
            </table>
			<table class="static" align="center" rules="all" border="1px" style="width: 95%;">
				<tr>
		            <th><center>Product / Item</center></th>
                    <th><center>Qty / Unit Sales</center></th>
                    <th><center>Price</center></th>
                    <th><center>Discount</center></th>
                    <th><center>Amount</center></th>
		        </tr>
		       
		        <tr>
		        	<td><center>{{ $item->product_id }}</center></td>
                    <td><center>{{ $item->quantity }}</center></td>
                    <td><center>{{ $item->unitprice }}</center></td>
                    <td><center>{{ $item->discount }}</center></td>
                    <td><center>Rp. {{ number_format ( $item->amount,0) }}</center></td>
		        </tr>
		        @endforeach
			</table>
		</div>
		<script type="text/javascript">
			window.print();
		</script>
</body>
</html>