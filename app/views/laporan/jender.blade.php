@section('addcss')
{{HTML::style('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}

{{HTML::style('assets/bower_components/datatables-responsive/css/dataTables.responsive.css')}}
@stop

@section('title')
<h1 class="page-header">{{$title}}</h1>
@stop

@section('content')
<div class="col-lg-12">
	<a href="{{url('laporan/jender/export')}}" class="pull-right btn btn-primary" target="_blank">Export</a><br>
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-bordered" id="all">
				<thead>
					<tr>
						<th rowspan="2">No.</th>
						<th rowspan="2">SKPD</th>
						<th colspan="2" class="text-center">Jenis Kelamin</th>
						<th rowspan="2" class="text-center">Jumlah</th>
					</tr>
					<tr>
						<th class="text-center">LK</th>
						<th class="text-center">PR</th>
					</tr>
				</thead>
				<tbody>
					@foreach($jender as $key => $value)
					<tr>
						<td colspan="1">{{$value->indexing}}</td>
						<td colspan="4">{{$value->nama}}</td>
					</tr>
						@foreach($value->skpd as $key2=>$value2)
							<? $found = 0; ?>
							@foreach($value->child as $key3=>$value3)
								@if($value2->namaSKPD == $value3->nama)
								<? $found++; ?>
								@endif
							@endforeach
							@if($found == 0)
								<tr>
									<td></td>
									<td>{{$key2+1}}. {{$value2->namaSKPD}}</td>
									<td>{{$value2->LK}}</td>
									<td>{{$value2->PR}}</td>
									<td>{{$value2->ALL}}</td>
								</tr>
							@endif
						@endforeach
						@foreach($value->child as $key2=>$value2)
							@if($value2->isSum == 0)
								@foreach($value->skpd as $key3=>$value3)
									@if($value2->nama == $value3->namaSKPD)
										<tr>
											<td></td>
											<td>{{$key3+1}}. {{$value3->namaSKPD}}</td>
											<td>{{$value3->LK}}</td>
											<td>{{$value3->PR}}</td>
											<td>{{$value3->ALL}}</td>
										</tr>
										@foreach($value->child as $key4=>$value4)
											@if($value4->isSum == 0)
												@if($value4->nama == $value3->namaSKPD)
													@foreach($value4->skpd as $key5=>$value5)
														<tr>
															<td></td>
															<td>&nbsp;&nbsp;&nbsp;- {{$value5->namaSKPD}}</td>
															<td>{{$value5->LK}}</td>
															<td>{{$value5->PR}}</td>
															<td>{{$value5->ALL}}</td>
														</tr>
													@endforeach
												@endif
												@foreach($value4->child as $key6=>$value6)
													@if($value6->grupId == $value4->id && $value3->namaSKPD == $value4->nama)
														@if(sizeof($value6->skpd) > 0)
															<? $LKtot = $PRtot = $ALLtot = 0; ?>
															@foreach($value6->skpd as $key7=>$value7)
															<?php
																$LKtot += $value7->LK;
																$PRtot += $value7->PR;
																$ALLtot += $value7->ALL;
															?>
															@endforeach
															<tr>
																<td></td>
																<td>&nbsp;&nbsp;&nbsp;- {{$value6->nama}}</td>
																<td>{{$LKtot}}</td>
																<td>{{$PRtot}}</td>
																<td>{{$ALLtot}}</td>
															</tr>
														@endif
													@endif
												@endforeach
											@else
												@foreach($value4->child as $key5=>$value5)
													<tr>
														<td>asdasd</td>
													</tr>
													@foreach($value4->skpd as $key6=>$value6)
														<?php
															$LKtot += $value6->LK;
															$PRtot += $value6->PR;
															$ALLtot += $value6->ALL;
														?>
													@endforeach	
													<tr>
														<td></td>
														<td>&nbsp;&nbsp;&nbsp;- {{$value4->nama}}</td>
														<td>{{$LKtot}}</td>
														<td>{{$PRtot}}</td>
														<td>{{$ALLtot}}</td>
													</tr>
												@endforeach	
											@endif								
										@endforeach
									@endif
								@endforeach
							@else
								<? $LKtot = $PRtot = $ALLtot = 0; ?>
								@foreach($value2->skpd as $key3=>$value3)
								<?php
									$LKtot += $value3->LK;
									$PRtot += $value3->PR;
									$ALLtot += $value3->ALL;
								?>
								@endforeach
								<tr>
									<td></td>
									<td>{{$key2+1}}. {{$value2->nama}}</td>
									<td>{{$LKtot}}</td>
									<td>{{$PRtot}}</td>
									<td>{{$ALLtot}}</td>
								</tr>
							@endif
						@endforeach

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