@section('addcss')
{{HTML::style('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}

{{HTML::style('assets/bower_components/datatables-responsive/css/dataTables.responsive.css')}}
@stop

@section('title')
<h1 class="page-header">{{$title}}</h1>
@stop

@section('content')
<div class="col-lg-12">
	<a href="{{'laporan/komposisi/export'}}" class="pull-right btn btn-primary" target="_">Export</a>
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-bordered" id="all">
				<thead>
					<tr>
						<th rowspan="3">No.</th>
						<th rowspan="3">SKPD</th>
						<th colspan="27" class="text-center">Eselon</th>
						<th colspan="3" rowspan="2" class="text-center">Jumlah Eselon</th>
						<th rowspan="3" class="text-center">Jml Fungsi Umum</th>
						<th rowspan="3" class="text-center">Jml Fungsi Tertentu</th>
						<th rowspan="3" class="text-center">Total Pegawai</th>
					</tr>
					<tr>
						<th colspan="3">I.a</th>
						<th colspan="3">I.b</th>
						<th colspan="3">II.a</th>
						<th colspan="3">II.b</th>
						<th colspan="3">III.a</th>
						<th colspan="3">III.b</th>
						<th colspan="3">IV.a</th>
						<th colspan="3">IV.b</th>
						<th colspan="3">V.a</th>
					</tr>
					<tr>
						<th class="text-center">Tersedia</th>
						<th class="text-center">Terisi</th>
						<th class="text-center">Kosong</th>

						<th class="text-center">Tersedia</th>
						<th class="text-center">Terisi</th>
						<th class="text-center">Kosong</th>

						<th class="text-center">Tersedia</th>
						<th class="text-center">Terisi</th>
						<th class="text-center">Kosong</th>

						<th class="text-center">Tersedia</th>
						<th class="text-center">Terisi</th>
						<th class="text-center">Kosong</th>

						<th class="text-center">Tersedia</th>
						<th class="text-center">Terisi</th>
						<th class="text-center">Kosong</th>

						<th class="text-center">Tersedia</th>
						<th class="text-center">Terisi</th>
						<th class="text-center">Kosong</th>

						<th class="text-center">Tersedia</th>
						<th class="text-center">Terisi</th>
						<th class="text-center">Kosong</th>

						<th class="text-center">Tersedia</th>
						<th class="text-center">Terisi</th>
						<th class="text-center">Kosong</th>

						<th class="text-center">Tersedia</th>
						<th class="text-center">Terisi</th>
						<th class="text-center">Kosong</th>

						<th class="text-center">Tersedia</th>
						<th class="text-center">Terisi</th>
						<th class="text-center">Kosong</th>
					</tr>
				</thead>
				<tbody>
					@foreach($komposisi as $key=>$value)
					<tr>
						<td>{{$key+1}}</td>
						<td>{{$value->nama}}</td>

						<td>{{$value->Ia_TERSEDIA}}</td>
						<td>{{$value->Ia_TERISI}}</td>
						<td>{{$value->Ia_KOSONG}}</td>

						<td>{{$value->Ib_TERSEDIA}}</td>
						<td>{{$value->Ib_TERISI}}</td>
						<td>{{$value->Ib_KOSONG}}</td>

						<td>{{$value->IIa_TERSEDIA}}</td>
						<td>{{$value->IIa_TERISI}}</td>
						<td>{{$value->IIa_KOSONG}}</td>

						<td>{{$value->IIb_TERSEDIA}}</td>
						<td>{{$value->IIb_TERISI}}</td>
						<td>{{$value->IIb_KOSONG}}</td>

						<td>{{$value->IIIa_TERSEDIA}}</td>
						<td>{{$value->IIIa_TERISI}}</td>
						<td>{{$value->IIIa_KOSONG}}</td>

						<td>{{$value->IIIb_TERSEDIA}}</td>
						<td>{{$value->IIIb_TERISI}}</td>
						<td>{{$value->IIIb_KOSONG}}</td>

						<td>{{$value->IVa_TERSEDIA}}</td>
						<td>{{$value->IVa_TERISI}}</td>
						<td>{{$value->IVa_KOSONG}}</td>

						<td>{{$value->IVb_TERSEDIA}}</td>
						<td>{{$value->IVb_TERISI}}</td>
						<td>{{$value->IVb_KOSONG}}</td>

						<td>{{$value->Va_TERSEDIA}}</td>
						<td>{{$value->Va_TERISI}}</td>
						<td>{{$value->Va_KOSONG}}</td>

						<td>{{$value->Va_TERSEDIA + $value->IVa_TERSEDIA + $value->IVb_TERSEDIA + $value->IIIa_TERSEDIA + $value->IIIb_TERSEDIA + $value->IIa_TERSEDIA + $value->IIb_TERSEDIA + $value->Ia_TERSEDIA + $value->Ib_TERSEDIA }}</td>
						<td>{{$value->Va_TERISI + $value->IVa_TERISI + $value->IVb_TERISI + $value->IIIa_TERISI + $value->IIIb_TERISI + $value->IIa_TERISI + $value->IIb_TERISI + $value->Ia_TERISI + $value->Ib_TERISI }}</td>
						<td>{{$value->Va_KOSONG + $value->IVa_KOSONG + $value->IVb_KOSONG + $value->IIIa_KOSONG + $value->IIIb_KOSONG + $value->IIa_KOSONG + $value->IIb_KOSONG + $value->Ia_KOSONG + $value->Ib_KOSONG }}</td>

						<td>{{$value->JmlFungsUmum}}</td>
						<td>{{$value->JmlFungsTertentu}}</td>

						<td>{{$value->Total}}</td>
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