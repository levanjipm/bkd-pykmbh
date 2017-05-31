<<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<table class="table table-bordered" id="all">
		<thead>
			<tr>
				<th colspan="5" style="vertical-align:bottom"><strong>{{$title}}</strong></th>
			</tr>
			<tr>
				<th colspan="5" style="vertical-align:bottom"><strong>DI LINGKUNGAN PEMERINTAH KOTA PAYAKUMBUH</strong></th>
			</tr>
			<tr>
				<th colspan="5" style="vertical-align:bottom"><strong>PROPINSI SUMATERA BARAT</strong></th>
			</tr>
			<tr>
				<th rowspan="2">No.</th>
				<th rowspan="2">SKPD</th>
				<th colspan="2" style="vertical-align:bottom">Jenis Kelamin</th>
				<th rowspan="2" style="vertical-align:bottom">Jumlah</th>
			</tr>
			<tr>
				<th style="vertical-align:bottom"></th>
				<th style="vertical-align:bottom"></th>
				<th style="vertical-align:bottom">LK</th>
				<th style="vertical-align:bottom">PR</th>
			</tr>
		</thead>
		<tbody>
			@foreach($jender as $key => $value)
			<tr>
				<td>{{$key+1}}</td>
				<td>{{$value->nama}}</td>
				<td>{{$value->LK}}</td>
				<td>{{$value->PR}}</td>
				<td>{{$value->ALL}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>