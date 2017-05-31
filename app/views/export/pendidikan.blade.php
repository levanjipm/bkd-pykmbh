<<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<table class="table table-bordered" id="all">
		<thead>
			<tr>
				<td colspan="14"><strong>{{$title}}</strong></td>
			</tr>
			<tr>
				<td colspan="14"><strong>DI LINGKUNGAN PEMERINTAH KOTA PAYAKUMBUH</strong></td>
			</tr>
			<tr>
				<td colspan="14"><strong>PROPINSI SUMATERA BARAT</strong></td>
			</tr>
			<tr>
				<th rowspan="2">No.</th>
				<th rowspan="2">SKPD</th>
				<th colspan="11" class="text-center">Pendidikan</th>
				<th rowspan="2" class="text-center">Jumlah</th>
			</tr>
			<tr>
				<th></th>
				<th></th>
				<th class="text-center">SD</th>
				<th class="text-center">SMP</th>
				<th class="text-center">SMA</th>
				<th class="text-center">D1</th>
				<th class="text-center">D2</th>
				<th class="text-center">D3</th>
				<th class="text-center">D4</th>
				<th class="text-center">S1</th>
				<th class="text-center">S2</th>
				<th class="text-center">S3</th>
				<th class="text-center">DLL</th>
			</tr>
			
		</thead>
		<tbody>
			@foreach($pendidikan as $key=>$value)
			<tr>
				<td>{{$key+1}}</td>
				<td>{{$value->nama}}</td>
				<td>{{$value->SD_ALL}}</td>
				<td>{{$value->SMP_ALL}}</td>
				<td>{{$value->SMA_ALL}}</td>
				<td>{{$value->D1_ALL}}</td>
				<td>{{$value->D2_ALL}}</td>
				<td>{{$value->D3_ALL}}</td>
				<td>{{$value->D4_ALL}}</td>
				<td>{{$value->S1_ALL}}</td>
				<td>{{$value->S2_ALL}}</td>
				<td>{{$value->S3_ALL}}</td>
				<td>{{$value->DLL}}</td>
				<td>{{$value->ALL}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>