<<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<table class="table table-bordered" id="all">
		<thead>
			<tr>
				<td colspan="7"><strong>{{$title}}</strong></td>
			</tr>
			<tr>
				<td colspan="7"><strong>DI LINGKUNGAN PEMERINTAH KOTA PAYAKUMBUH</strong></td>
			</tr>
			<tr>
				<td colspan="7"><strong>PROPINSI SUMATERA BARAT</strong></td>
			</tr>
			<tr>
				<th rowspan="3">No.</th>
				<th rowspan="3">SKPD</th>
				<th colspan="5" class="text-center">Eselon</th>
			</tr>
			<tr>
				<th class="text-center">I</th>
				<th class="text-center">II</th>
				<th class="text-center">III</th>
				<th class="text-center">IV</th>
				<th class="text-center">V</th>
			</tr>
			<tr>
				<th class="text-center">JML</th>
				<th class="text-center">JML</th>
				<th class="text-center">JML</th>
				<th class="text-center">JML</th>
				<th class="text-center">Va</th>
			</tr>
		</thead>
		<tbody>
			@foreach($eselon as $key=>$value)
			<tr>
				<td>{{$key+1}}</td>
				<td>{{$value->nama}}</td>
				<td>{{$value->I_JML}}</td>
				<td>{{$value->II_JML}}</td>
				<td>{{$value->III_JML}}</td>
				<td>{{$value->IV_JML}}</td>
				<td>{{$value->Va}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>