<<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<table class="table table-bordered" id="all">
		<thead>
			<tr>
				<td colspan="24"><strong>{{$title}}</strong></td>
			</tr>
			<tr>
				<td colspan="24"><strong>DI LINGKUNGAN PEMERINTAH KOTA PAYAKUMBUH</strong></td>
			</tr>
			<tr>
				<td colspan="24"><strong>PROPINSI SUMATERA BARAT</strong></td>
			</tr>
			<tr>
				<th rowspan="2">No.</th>
				<th rowspan="2">SKPD</th>
				<th colspan="5" class="text-center">Golongan I</th>
				<th colspan="5" class="text-center">Golongan II</th>
				<th colspan="5" class="text-center">Golongan III</th>
				<th colspan="6" class="text-center">Golongan IV</th>
				<th rowspan="2" class="text-center">Total</th>
			</tr>
			<tr>
				<th class="text-center">1/a</th>
				<th class="text-center">1/b</th>
				<th class="text-center">1/c</th>
				<th class="text-center">1/d</th>
				<th class="text-center">Jml</th>

				<th class="text-center">2/a</th>
				<th class="text-center">2/b</th>
				<th class="text-center">2/c</th>
				<th class="text-center">2/d</th>
				<th class="text-center">Jml</th>

				<th class="text-center">3/a</th>
				<th class="text-center">3/b</th>
				<th class="text-center">3/c</th>
				<th class="text-center">3/d</th>
				<th class="text-center">Jml</th>

				<th class="text-center">4/a</th>
				<th class="text-center">4/b</th>
				<th class="text-center">4/c</th>
				<th class="text-center">4/d</th>
				<th class="text-center">4/e</th>
				<th class="text-center">Jml</th>
			</tr>
		</thead>
		<tbody>
			@foreach($golongan as $key=>$value)
			<tr>
				<td>{{$key+1}}</td>
				<td>{{$value->nama}}</td>
				<td>{{$value->a1}}</td>
				<td>{{$value->b1}}</td>
				<td>{{$value->c1}}</td>
				<td>{{$value->d1}}</td>
				<td>{{$value->JML_1}}</td>
				<td>{{$value->a2}}</td>
				<td>{{$value->b2}}</td>
				<td>{{$value->c2}}</td>
				<td>{{$value->d2}}</td>
				<td>{{$value->JML_2}}</td>
				<td>{{$value->a3}}</td>
				<td>{{$value->b3}}</td>
				<td>{{$value->c3}}</td>
				<td>{{$value->d3}}</td>
				<td>{{$value->JML_3}}</td>
				<td>{{$value->a4}}</td>
				<td>{{$value->b4}}</td>
				<td>{{$value->c4}}</td>
				<td>{{$value->d4}}</td>
				<td>{{$value->e4}}</td>
				<td>{{$value->JML_4}}</td>
				<td>{{$value->JML_1+$value->JML_2+$value->JML_3+$value->JML_4}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>