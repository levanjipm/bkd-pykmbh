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
	<div class="form-group">
		<div class="checkbox">
			<label>
				<input type="checkbox" id="show" onchange="show()" checked="true">Checkbox 1
			</label>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-bordered" id="all">
				<thead>
					<tr>
						<th rowspan="3">No.</th>
						<th rowspan="3">SKPD</th>
						<th colspan="33" class="text-center">Pendidikan</th>
						<th rowspan="3" class="text-center">Jumlah</th>
					</tr>
					<tr>
						<th colspan="3" class="text-center">SD</th>
						<th colspan="3" class="text-center">SMP</th>
						<th colspan="3" class="text-center">SMA</th>
						<th colspan="3" class="text-center">D1</th>
						<th colspan="3" class="text-center">D2</th>
						<th colspan="3" class="text-center">D3</th>
						<th colspan="3" class="text-center">D4</th>
						<th colspan="3" class="text-center">S1</th>
						<th colspan="3" class="text-center">S2</th>
						<th colspan="3" class="text-center">S3</th>
						<th colspan="3" class="text-center">DLL</th>
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
						<th>LK</th>
						<th>PR</th>
						<th>Jml</th>
					</tr>
				</thead>
				<tbody>
					@foreach($pendidikan as $key=>$value)
					<tr>
						<td>{{$key+1}}</td>
						<td>{{$value->nama}}</td>
						<td>{{$value->SD_LK}}</td>
						<td>{{$value->SD_PR}}</td>
						<td>{{$value->SD_ALL}}</td>
						<td>{{$value->SMP_LK}}</td>
						<td>{{$value->SMP_PR}}</td>
						<td>{{$value->SMP_ALL}}</td>
						<td>{{$value->SMA_LK}}</td>
						<td>{{$value->SMA_PR}}</td>
						<td>{{$value->SMA_ALL}}</td>
						<td>{{$value->D1_LK}}</td>
						<td>{{$value->D1_PR}}</td>
						<td>{{$value->D1_ALL}}</td>
						<td>{{$value->D2_LK}}</td>
						<td>{{$value->D2_PR}}</td>
						<td>{{$value->D2_ALL}}</td>
						<td>{{$value->D3_LK}}</td>
						<td>{{$value->D3_PR}}</td>
						<td>{{$value->D3_ALL}}</td>
						<td>{{$value->D4_LK}}</td>
						<td>{{$value->D4_PR}}</td>
						<td>{{$value->D4_ALL}}</td>
						<td>{{$value->S1_LK}}</td>
						<td>{{$value->S1_PR}}</td>
						<td>{{$value->S1_ALL}}</td>
						<td>{{$value->S2_LK}}</td>
						<td>{{$value->S2_PR}}</td>
						<td>{{$value->S2_ALL}}</td>
						<td>{{$value->S3_LK}}</td>
						<td>{{$value->S3_PR}}</td>
						<td>{{$value->S3_ALL}}</td>
						<td>{{$value->DLL_LK}}</td>
						<td>{{$value->DLL_PR}}</td>
						<td>{{$value->DLL_ALL}}</td>
						<td>{{$value->ALL}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<table class="table table-bordered" id="nojml" style="display:none;">
				<thead>
					<tr>
						<th rowspan="3">No.</th>
						<th rowspan="3">SKPD</th>
						<th colspan="30" class="text-center">Pendidikan</th>
						<th rowspan="3" class="text-center">Jumlah</th>
					</tr>
					<tr>
						<th colspan="3" class="text-center">SD</th>
						<th colspan="3" class="text-center">SMP</th>
						<th colspan="3" class="text-center">SMA</th>
						<th colspan="3" class="text-center">D1</th>
						<th colspan="3" class="text-center">D2</th>
						<th colspan="3" class="text-center">D3</th>
						<th colspan="3" class="text-center">D4</th>
						<th colspan="3" class="text-center">S1</th>
						<th colspan="3" class="text-center">S2</th>
						<th colspan="3" class="text-center">S3</th>
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
					@foreach($pendidikan as $key=>$value)
					<tr>
						<td>{{$key+1}}</td>
						<td>{{$value->nama}}</td>
						<td>{{$value->SD_LK}}</td>
						<td>{{$value->SD_PR}}</td>
						<td>{{$value->SD_ALL}}</td>
						<td>{{$value->SMP_LK}}</td>
						<td>{{$value->SMP_PR}}</td>
						<td>{{$value->SMP_ALL}}</td>
						<td>{{$value->SMA_LK}}</td>
						<td>{{$value->SMA_PR}}</td>
						<td>{{$value->SMA_ALL}}</td>
						<td>{{$value->D1_LK}}</td>
						<td>{{$value->D1_PR}}</td>
						<td>{{$value->D1_ALL}}</td>
						<td>{{$value->D2_LK}}</td>
						<td>{{$value->D2_PR}}</td>
						<td>{{$value->D2_ALL}}</td>
						<td>{{$value->D3_LK}}</td>
						<td>{{$value->D3_PR}}</td>
						<td>{{$value->D3_ALL}}</td>
						<td>{{$value->D4_LK}}</td>
						<td>{{$value->D4_PR}}</td>
						<td>{{$value->D4_ALL}}</td>
						<td>{{$value->S1_LK}}</td>
						<td>{{$value->S1_PR}}</td>
						<td>{{$value->S1_ALL}}</td>
						<td>{{$value->S2_LK}}</td>
						<td>{{$value->S2_PR}}</td>
						<td>{{$value->S2_ALL}}</td>
						<td>{{$value->S3_LK}}</td>
						<td>{{$value->S3_PR}}</td>
						<td>{{$value->S3_ALL}}</td>
						<td>{{$value->ALL}}</td>
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

<script type="text/javascript">
	function show () 
	{
		$('#nojml').toggle();
		$('#all').toggle();
	}
</script>
@stop