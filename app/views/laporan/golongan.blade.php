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
						<th rowspan="2">No.</th>
						<th rowspan="2">SKPD</th>
						<th colspan="5" class="text-center">Golongan I</th>
						<th colspan="5" class="text-center">Golongan II</th>
						<th colspan="5" class="text-center">Golongan III</th>
						<th colspan="6" class="text-center">Golongan IV</th>
						<th rowspan="2" class="text-center">Total</th>
					</tr>
					<tr>
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
		</div>
	</div>
</div>
@stop

@section('addjs')
{{HTML::script('assets/bower_components/datatables/media/js/jquery.dataTables.min.js')}}

{{HTML::script('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}
@stop