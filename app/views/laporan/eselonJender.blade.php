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
						<th rowspan="4">No.</th>
						<th rowspan="4">SKPD</th>
						<th colspan="31" class="text-center">Eselon</th>
						<th rowspan="4">Total</th>
					</tr>
					<tr>
						<th colspan="7" class="text-center">I</th>
						<th colspan="7" class="text-center">II</th>
						<th colspan="7" class="text-center">III</th>
						<th colspan="7" class="text-center">IV</th>
						<th colspan="3" class="text-center">V</th>
					</tr>
					<tr>
						<th colspan="3" class="text-center">Laki-laki</th>
						<th colspan="3" class="text-center">Perempuan</th>
						<th rowspan="2">JML</th>

						<th colspan="3" class="text-center">Laki-laki</th>
						<th colspan="3" class="text-center">Perempuan</th>
						<th rowspan="2">JML</th>

						<th colspan="3" class="text-center">Laki-laki</th>
						<th colspan="3" class="text-center">Perempuan</th>
						<th rowspan="2">JML</th>

						<th colspan="3" class="text-center">Laki-laki</th>
						<th colspan="3" class="text-center">Perempuan</th>
						<th rowspan="2">JML</th>

						<th class="text-center">LK</th>
						<th class="text-center">PR</th>
						<th rowspan="2">JML</th>
					</tr>
					<tr>
						<th class="text-center">I.a</th>
						<th class="text-center">I.b</th>
						<th class="text-center">jml</th>
						<th class="text-center">I.a</th>
						<th class="text-center">I.b</th>
						<th class="text-center">jml</th>
						<th class="text-center">II.a</th>
						<th class="text-center">II.b</th>
						<th class="text-center">jml</th>
						<th class="text-center">II.a</th>
						<th class="text-center">II.b</th>
						<th class="text-center">jml</th>
						<th class="text-center">III.a</th>
						<th class="text-center">III.b</th>
						<th class="text-center">jml</th>
						<th class="text-center">III.a</th>
						<th class="text-center">III.b</th>
						<th class="text-center">jml</th>
						<th class="text-center">IV.a</th>
						<th class="text-center">IV.b</th>
						<th class="text-center">jml</th>
						<th class="text-center">IV.a</th>
						<th class="text-center">IV.b</th>
						<th class="text-center">jml</th>
						<th class="text-center">V.a</th>
						<th class="text-center">V.a</th>
					</tr>
				</thead>
				<tbody>
					@foreach($eselon as $key=>$value)
					<tr>
						<td>{{$key+1}}</td>
						<td>{{$value->nama}}</td>

						<td>{{$value->Ia_LK}}</td>
						<td>{{$value->Ib_LK}}</td>
						<td>{{$value->Ia_LK + $value->Ib_LK}}</td>

						<td>{{$value->Ia_PR}}</td>
						<td>{{$value->Ib_PR}}</td>
						<td>{{$value->Ia_PR + $value->Ib_PR}}</td>

						<td>{{$value->I_JML}}</td>

						<td>{{$value->IIa_LK}}</td>
						<td>{{$value->IIb_LK}}</td>
						<td>{{$value->IIa_LK + $value->IIb_LK}}</td>

						<td>{{$value->IIa_PR}}</td>
						<td>{{$value->IIb_PR}}</td>
						<td>{{$value->IIa_PR + $value->IIb_PR}}</td>

						<td>{{$value->II_JML}}</td>

						<td>{{$value->IIIa_LK}}</td>
						<td>{{$value->IIIb_LK}}</td>
						<td>{{$value->IIIa_LK + $value->IIIb_LK}}</td>

						<td>{{$value->IIIa_PR}}</td>
						<td>{{$value->IIIb_PR}}</td>
						<td>{{$value->IIIa_PR + $value->IIIb_PR}}</td>

						<td>{{$value->III_JML}}</td>

						<td>{{$value->IVa_LK}}</td>
						<td>{{$value->IVb_LK}}</td>
						<td>{{$value->IVa_LK + $value->IVb_LK}}</td>

						<td>{{$value->IVa_PR}}</td>
						<td>{{$value->IVb_PR}}</td>
						<td>{{$value->IVa_PR + $value->IVb_PR}}</td>

						<td>{{$value->IV_JML}}</td>

						<td>{{$value->Va_LK}}</td>

						<td>{{$value->Va_PR}}</td>

						<td>{{$value->V_JML}}</td>

						<td>{{$value->TOTAL}}</td>

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