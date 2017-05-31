@section('addcss')
{{HTML::style('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}

{{HTML::style('assets/bower_components/datatables-responsive/css/dataTables.responsive.css')}}
@stop

@section('title')
<h1 class="page-header">{{$title}}</h1>
@stop

@section('content')
<div class="col-lg-12">
	<a href="{{url('laporan/export')}}" class="pull-right btn btn-primary" target="_blank">Export</a>
	<div class="form-group">
		<div class="checkbox">
			<label>
				<input type="checkbox" id="show">Checkbox 1
			</label>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th rowspan="3">No.</th>
						<th rowspan="3">SKPD</th>
						<th colspan="15" class="text-center">Pendidikan</th>
						<th rowspan="3" class="text-center">Jumlah</th>
					</tr>
					<tr>
						<th colspan="3" class="text-center">SD</th>
						<th colspan="3" class="text-center">SMP</th>
						<th colspan="3" class="text-center">SMA</th>
						<th colspan="3" class="text-center">DIII</th>
						<th colspan="3" class="text-center">S1</th>
					</tr>
					<tr>
						<th>LK</th>
						<th>PR</th>
						<th>Jml</th>
						<th>LK</th>
						<th>PR</th>
						<th>Jml</th>
						<th>LK</th>
						<th>PR</th>
						<th>Jml</th>
						<th>LK</th>
						<th>PR</th>
						<th>Jml</th>
						<th>LK</th>
						<th>PR</th>
						<th>Jml</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>Sekretariat Daerah</td>
						<td>3</td>
						<td>3</td>
						<td>3</td>
						<td>3</td>
						<td>3</td>
						<td>3</td>
						<td>3</td>
						<td>3</td>
						<td>3</td>
						<td>3</td>
						<td>3</td>
						<td>3</td>
						<td>3</td>
						<td>3</td>
						<td>3</td>
						<td>100</td>
					</tr>
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