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
	<title>Room</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
		<div class="form-group">
			<p align="center"><b>FLOOR REPORT</b></p>
			<table class="table table-hover">
				<tbody>
					<tr style="text-align:center;">
						<td>Date / Time :	<b><?php echo "" . date("d F Y / H:i:s") . ""; ?></b></td>
					</tr>
				</tbody>
			</table>
			<table class="static" align="center" rules="all" border="1px" style="width: 95%;">
				<tr>
		           <th><center>No</center></th>
                   <th><center>Room Type</center></th>
                   <th><center>Room Number</center></th>
                   <th><center>Price</center></th>
                   <th><center>Code</center></th>
		        </tr>
		        @foreach($data as $e=>$dt)
                <tr>
                    <td><center>{{ $e+1 }}</center></td>
                    <td><center>{{ $dt->roomType }}</center></td>
                    <td><center>{{ $dt->numberRoom }}</center></td>
                    <td><center>Rp. {{ number_format ($dt->price,0) }}</center></td>
                    <td><center>{{ $dt->code }}</center></td>
		        </tr>
		        @endforeach
			</table>
		</div>
		<script type="text/javascript">
			window.print();
		</script>
<table class="table table-hover">				
					<tr style="text-align:right;">
						<th>Signature of Clerk :</th>
						<th></th>
					</tr>
			</table>
			<table>				
					<tr>
						<th>OD</th>
						<td>=</td>
						<td>Occupied Dirty</td>

						<th></th>
						<td></td>
						<td></td>

						<th>VD</th>
						<td>=</td>
						<td>Vacant Dirty</td>						
		            </tr>

		            <tr>
		            	<th>OC</th>
						<td>=</td>
						<td>Occupied Clean</td>

						<th></th>
						<td></td>
						<td></td>		             

						<th>VR</th>
						<td>=</td>
						<td>Vacant Ready</td>
		            </tr>

		            <tr>
		             	<th>VC</th>
						<td>=</td>
						<td>Vacant Clean</td>

						<th></th>
						<td></td>
						<td></td>

		             	<th>OO</th>
						<td>=</td>
						<td>Out of Order</td>						               		
		            </tr>
			</table>
		</div>
	</div>

</body>
</html>