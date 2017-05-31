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
		</div>
	</div>
</div>
@stop

@section('addjs')
{{HTML::script('assets/bower_components/datatables/media/js/jquery.dataTables.min.js')}}

{{HTML::script('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}
@stop