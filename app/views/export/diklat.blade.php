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
				<th rowspan="2">No.</th>
				<th rowspan="2">SKPD</th>
				<th colspan="4" class="text-center">Diklat</th>
				<th rowspan="2" class="text-center">Jumlah</th>
			</tr>
			<tr>
				<th class="text-center">ADUM / SEPADA / PIM IV</th>
				<th class="text-center">ADUMLA / SEPALA</th>
				<th class="text-center">SPAMA / SEPADYA / PIM III</th>
				<th class="text-center">SPAMEN / PIM II</th>
			</tr>
		</thead>
		<tbody>
			@foreach($diklat as $key=>$value)
			<tr>
				<td>{{$key+1}}</td>
				<td>{{$value->nama}}</td>
				<td>{{$value->ADUMSEPADAPIMIV}}</td>
				<td>{{$value->ADUMLASEPALA}}</td>
				<td>{{$value->SPAMASEPADYAPIMIII}}</td>
				<td>{{$value->SPAMENPIMII}}</td>
				<td>{{$value->JML}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>