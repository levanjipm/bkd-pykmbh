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
						<th colspan="12" class="text-center">Diklat Struktural</th>
						<th rowspan="3" class="text-center">Jumlah</th>
					</tr>
					<tr>
						<th  colspan="3" class="text-center">ADUM / SEPADA / PIM IV</th>
						<th  colspan="3" class="text-center">ADUMLA / SEPALA</th>
						<th  colspan="3" class="text-center">SPAMA / SEPADYA / PIM III</th>
						<th  colspan="3" class="text-center">SPAMEN / PIM II</th>
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
					</tr>
				</thead>
				<tbody>
					@foreach($diklat as $key=>$value)
					<tr>
						<td>{{$key+1}}</td>
						<td>{{$value->nama}}</td>
						<td>{{$value->ADUMSEPADAPIMIV_LK}}</td>
						<td>{{$value->ADUMSEPADAPIMIV_PR}}</td>
						<td>{{$value->ADUMSEPADAPIMIV_LK + $value->ADUMSEPADAPIMIV_PR}}</td>
						<td>{{$value->ADUMLASEPALA_LK}}</td>
						<td>{{$value->ADUMLASEPALA_PR}}</td>
						<td>{{$value->ADUMLASEPALA_LK+$value->ADUMLASEPALA_PR}}</td>
						<td>{{$value->SPAMASEPADYAPIMIII_LK}}</td>
						<td>{{$value->SPAMASEPADYAPIMIII_PR}}</td>
						<td>{{$value->SPAMASEPADYAPIMIII_LK+$value->SPAMASEPADYAPIMIII_PR}}</td>
						<td>{{$value->SPAMENPIMII_LK}}</td>
						<td>{{$value->SPAMENPIMII_PR}}</td>
						<td>{{$value->SPAMENPIMII_LK+$value->SPAMENPIMII_PR}}</td>
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