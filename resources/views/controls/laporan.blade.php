<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
			.tengah{
				text-align:center;
			}
			.kiri{
				text-align:left;
			}
			.kanan{
				text-align:right;
			}

		table.static {
			position: relative;
			/* left: 3% */
			border: 1px solid #543535;
		}

	</style>
	<title>Control of Linen Exchange</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
		<div class="form-group">
			<p align="center"><b>CONTROL OF LINEN EXCHANGE</b></p>
			<table class="table table-hover">
				<tbody>
					 @foreach ($controls as $data)
					<tr>
						<td>Guest Name :	<b>{{ $data->guest_name }}</b></td>
					
						<td>Room :	<b>{{ $data->room_id }}</b></td>
					</tr>
					<tr>						
						<td>Date Report :	<b>{{ date('d F Y / H:i:s',strtotime($data->date)) }}</b></td>
						
						<td>Checked By :	<b>{{ $data->checked_by }}</b></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<table class="static" align="center" rules="all" border="1px" style="width: 95%;">
				<tr>
		            <th><center>No.</center></th>		       
		            <th><center>Articles</center></th>
		            <th><center>Dirty Linen Given</center></th>
		            <th><center>Clean Linen Received</center></th>
		            <th><center>Description</center></th>
		        </tr>
		        @foreach ($control_details as $e=>$data)
		        <tr>
		        	<td><center>{{ $e+1 }}</center></td>
		       		<td><center>{{ $data->articles }}</center></td>
		        	<td><center>{{ $data->dirty }}</center></td>
		        	<td><center>{{ $data->clean }}</center></td>
		        	<td><center>{{ $data->description }}</center></td>
		        </tr>
		        @endforeach
			</table>
		</div>
		<script type="text/javascript">
			window.print();
		</script>
		<table class="table table-hover">
			@foreach ($controls as $data)				
			<tr style="text-align:left;">
				<th>Signature :</th>
				<th></th>
			</tr>
			@endforeach
		</table>
</body>
</html>