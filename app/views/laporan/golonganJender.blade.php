@section('addcss')
{{HTML::style('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}

{{HTML::style('assets/bower_components/datatables-responsive/css/dataTables.responsive.css')}}
@stop

@section('title')
<h1 class="page-header">{{$title}}</h1>
@stop

@section('content')
<div class="col-lg-12">
	<a href="{{'laporan/export'}}" class="pull-right btn btn-primary" target="_">Export</a>
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-bordered" id="all">
				<thead>
					<tr>
						<th rowspan="3">No.</th>
						<th rowspan="3">SKPD</th>
						<th colspan="11" class="text-center">Golongan I</th>
						<th colspan="11" class="text-center">Golongan II</th>
						<th colspan="11" class="text-center">Golongan III</th>
						<th colspan="13" class="text-center">Golongan IV</th>
						<th rowspan="3" class="text-center">Total</th>
					</tr>
					<tr>
						<th colspan="5">Laki-Laki</th>
						<th colspan="5">Perempuan</th>
						<th rowspan="2">JML I</th>

						<th colspan="5">Laki-Laki</th>
						<th colspan="5">Perempuan</th>
						<th rowspan="2">JML II</th>

						<th colspan="5">Laki-Laki</th>
						<th colspan="5">Perempuan</th>
						<th rowspan="2">JML III</th>

						<th colspan="6">Laki-Laki</th>
						<th colspan="6">Perempuan</th>
						<th rowspan="2">JML IV</th>
					</tr>
					<tr>
						<th class="text-center">I/a</th>
						<th class="text-center">I/b</th>
						<th class="text-center">I/c</th>
						<th class="text-center">I/d</th>
						<th class="text-center">Jml</th>

						<th class="text-center">I/a</th>
						<th class="text-center">I/b</th>
						<th class="text-center">I/c</th>
						<th class="text-center">I/d</th>
						<th class="text-center">Jml</th>

						<th class="text-center">II/a</th>
						<th class="text-center">II/b</th>
						<th class="text-center">II/c</th>
						<th class="text-center">II/d</th>
						<th class="text-center">Jml</th>

						<th class="text-center">II/a</th>
						<th class="text-center">II/b</th>
						<th class="text-center">II/c</th>
						<th class="text-center">II/d</th>
						<th class="text-center">Jml</th>

						<th class="text-center">III/a</th>
						<th class="text-center">III/b</th>
						<th class="text-center">III/c</th>
						<th class="text-center">III/d</th>
						<th class="text-center">Jml</th>

						<th class="text-center">III/a</th>
						<th class="text-center">III/b</th>
						<th class="text-center">III/c</th>
						<th class="text-center">III/d</th>
						<th class="text-center">Jml</th>

						<th class="text-center">IV/a</th>
						<th class="text-center">IV/b</th>
						<th class="text-center">IV/c</th>
						<th class="text-center">IV/d</th>
						<th class="text-center">IV/e</th>
						<th class="text-center">Jml</th>

						<th class="text-center">IV/a</th>
						<th class="text-center">IV/b</th>
						<th class="text-center">IV/c</th>
						<th class="text-center">IV/d</th>
						<th class="text-center">IV/e</th>
						<th class="text-center">Jml</th>
					</tr>
				</thead>
				<tbody>
					@foreach($golongan as $key=>$value)
					<tr>
						<td>{{$key+1}}</td>
						<td>{{$value->nama}}</td>

						<td>{{$value->a1_LK}}</td>
						<td>{{$value->b1_LK}}</td>
						<td>{{$value->c1_LK}}</td>
						<td>{{$value->d1_LK}}</td>
						
						<td>{{$value->a1_LK + $value->b1_LK + $value->c1_LK + $value->d1_LK}}</td>


						<td>{{$value->a1_PR}}</td>
						<td>{{$value->b1_PR}}</td>
						<td>{{$value->c1_PR}}</td>
						<td>{{$value->d1_PR}}</td>
						
						<td>{{$value->a1_PR + $value->b1_PR + $value->c1_PR + $value->d1_PR}}</td>
						

						<td>{{$value->JML_1}}</td>

						<td>{{$value->a2_LK}}</td>
						<td>{{$value->b2_LK}}</td>
						<td>{{$value->c2_LK}}</td>
						<td>{{$value->d2_LK}}</td>

						<td>{{$value->a2_LK + $value->b2_LK + $value->c2_LK + $value->d2_LK}}</td>

						<td>{{$value->a2_PR}}</td>
						<td>{{$value->b2_PR}}</td>
						<td>{{$value->c2_PR}}</td>
						<td>{{$value->d2_PR}}</td>
						<td>{{$value->a2_PR + $value->b2_PR + $value->c2_PR + $value->d2_PR}}</td>
						
						<td>{{$value->JML_2}}</td>
						
						<td>{{$value->a3_LK}}</td>
						<td>{{$value->b3_LK}}</td>
						<td>{{$value->c3_LK}}</td>
						<td>{{$value->d3_LK}}</td>

						<td>{{$value->a3_LK + $value->b3_LK + $value->c3_LK + $value->d3_LK}}</td>


						<td>{{$value->a3_PR}}</td>
						<td>{{$value->b3_PR}}</td>
						<td>{{$value->c3_PR}}</td>
						<td>{{$value->d3_PR}}</td>
						<td>{{$value->a3_PR + $value->b3_PR + $value->c3_PR + $value->d3_PR}}</td>
						

						<td>{{$value->JML_3}}</td>
						
						<td>{{$value->a4_LK}}</td>
						<td>{{$value->b4_LK}}</td>
						<td>{{$value->c4_LK}}</td>
						<td>{{$value->d4_LK}}</td>
						<td>{{$value->e4_LK}}</td>

						<td>{{$value->a4_LK + $value->b4_LK + $value->c4_LK + $value->d4_LK + $value->e4_LK}}</td>


						<td>{{$value->a4_PR}}</td>
						<td>{{$value->b4_PR}}</td>
						<td>{{$value->c4_PR}}</td>
						<td>{{$value->d4_PR}}</td>
						<td>{{$value->e4_PR}}</td>

						<td>{{$value->a4_PR + $value->b4_PR + $value->c4_PR + $value->d4_PR + $value->e4_PR}}</td>


						<td>{{$value->JML_4}}</td>

						<td>{{$value->JML_1+$value->JML_2+$value->JML_3+$value->JML_4}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop

@section('addjs')
{{HTML::script('assets/bower_components/datatables/media/js/jquery.dataTables.min.js')}}

{{HTML::script('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}
@stop