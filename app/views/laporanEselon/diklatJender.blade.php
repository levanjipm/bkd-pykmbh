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
						<th colspan="32" class="text-center">Diklat Struktural</th>
						<th rowspan="3" class="text-center">TOTAL</th>
					</tr>
					<tr>
						<th>ADUM</th>
						<th>ADUM</th>
						<th>SEPADA</th>
						<th>SEPADA</th>
						<th>PIM IV</th>
						<th>PIM IV</th>
						<th colspan="3" class="text-center">ADUM / SEPADA / PIM IV</th>
					
						<th>ADUMLA</th>
						<th>ADUMLA</th>
						<th>SEPALA</th>
						<th>SEPALA</th>
						<th colspan="3" class="text-center">ADUMLA / SEPALA</th>
						
						<th>SPAMA</th>
						<th>SPAMA</th>
						<th>SEPADYA</th>
						<th>SEPADYA</th>
						<th>PIM III</th>
						<th>PIM III</th>
						<th colspan="3" class="text-center">SPAMA / SEPADYA / PIM III</th>
						
						<th>SPAMEN</th>
						<th>SPAMEN</th>
						<th>PIM II</th>
						<th>PIM II</th>
						<th colspan="3" class="text-center">SPAMEN / PIM II</th>
					</tr>
					<tr>
						<th>LK</th>
						<th>PR</th>
						<th>LK</th>
						<th>PR</th>
						<th>LK</th>
						<th>PR</th>

						<th>LK</th>
						<th>PR</th>
						<th>Jml</th>
						
						<th>LK</th>
						<th>PR</th>
						<th>LK</th>
						<th>PR</th>

						<th>LK</th>
						<th>PR</th>
						<th>Jml</th>
						
						<th>LK</th>
						<th>PR</th>
						<th>LK</th>
						<th>PR</th>
						<th>LK</th>
						<th>PR</th>

						<th>LK</th>
						<th>PR</th>
						<th>Jml</th>
						
						<th>LK</th>
						<th>PR</th>
						<th>LK</th>
						<th>PR</th>

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
						
						<td>{{$value->ADUM_LK}}</td>
						<td>{{$value->ADUM_PR}}</td>

						<td>{{$value->SEPADA_LK}}</td>
						<td>{{$value->SEPADA_PR}}</td>

						<td>{{$value->PIM_IV_LK}}</td>
						<td>{{$value->PIM_IV_PR}}</td>

						<td>{{$value->ADUM_LK+$value->SEPADA_LK+$value->PIM_IV_LK}}</td>
						<td>{{$value->ADUM_PR+$value->SEPADA_PR+$value->PIM_IV_PR}}</td>
						<td>{{$value->ADUMSEPADAPIM_IV}}</td>
						

						<td>{{$value->ADUMLA_LK}}</td>
						<td>{{$value->ADUMLA_PR}}</td>

						<td>{{$value->SEPALA_LK}}</td>
						<td>{{$value->SEPALA_PR}}</td>

						<td>{{$value->ADUMLA_LK+$value->SEPALA_LK}}</td>
						<td>{{$value->ADUMLA_PR+$value->SEPALA_PR}}</td>
						<td>{{$value->ADUMLASEPALA}}</td>
						

						<td>{{$value->SPAMA_LK}}</td>
						<td>{{$value->SPAMA_PR}}</td>

						<td>{{$value->SEPADAYA_LK}}</td>
						<td>{{$value->SEPADYA_PR}}</td>

						<td>{{$value->PIM_III_LK}}</td>
						<td>{{$value->PIM_III_PR}}</td>

						<td>{{$value->SPAMA_LK+$value->SEPADAYA_LK+$value->PIM_III_LK}}</td>
						<td>{{$value->SPAMA_PR+$value->SEPADYA_PR+$value->PIM_III_PR}}</td>
						<td>{{$value->SPAMASEPADYAPIMIII}}</td>
						
						<td>{{$value->SPAMEN_LK}}</td>
						<td>{{$value->SPAMEN_PR}}</td>

						<td>{{$value->PIM_II_LK}}</td>
						<td>{{$value->PIM_II_PR}}</td>

						<td>{{$value->SPAMEN_LK+$value->PIM_II_LK}}</td>
						<td>{{$value->SPAMEN_PR+$value->PIM_II_PR}}</td>
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
@stop