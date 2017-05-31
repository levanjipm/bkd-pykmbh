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
		</div>
	</div>
</div>
@stop

@section('addjs')
{{HTML::script('assets/bower_components/datatables/media/js/jquery.dataTables.min.js')}}

{{HTML::script('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}
@stop