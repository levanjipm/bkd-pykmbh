
@section('title')
<h1 class="page-header">Data PNS</h1>
@stop

@section('content')
<div class="col-lg-3">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="form-group">
				<label>NIP Lama</label>
				<p>{{$pns->niplama}}</p>
			</div>
			<div class="form-group">
				<label>NIP Baru</label>
				<p>{{$pns->nipbaru}}</p>
			</div>
			<div class="form-group">
				<label>Nama PNS</label>
				<p>{{$pns->gelardepan}} {{$pns->nama}} {{$pns->gelarbelakang}}</p>
			</div>
			<div class="form-group">
				<label>Jenis Kelamin</label>
				<p>{{jenisKelamin($pns->jeniskelamin)}}</p>
			</div>
			<div class="form-group">
				<label>Tempat dan Tanggal Lahir</label>
				<p>{{$pns->tempatlahir}}, {{$pns->tanggallahir}}</p>
			</div>
			<div class="form-group">
				<label>Kedudukan Hukum</label>
				<p>{{$pns->kedudukanhukum}}</p>
			</div>
			<div class="form-group">
				<label>Jenis Pegawai</label>
				<p>{{$pns->jenispegawai}}</p>
			</div>
			@if(checkAdmin())
			<a href="{{url('/data/pns/'.$pns->id.'/edit')}}" class="btn btn-success pull-right">Edit</a>
			@endif
		</div>
	</div>
</div>
<div class="col-lg-9">
	<div class="panel panel-default">
		<div class="panel-heading">
			<p><strong>Data Historis</strong></p>
		</div>
		<div class="panel-body">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs">
				<li class="active"><a href="#skpd" data-toggle="tab">SKPD</a>
				</li>
				<li><a href="#fungsional" data-toggle="tab">Jabatan Fungsional</a>
				</li>
				<li><a href="#pendidikan" data-toggle="tab">Pendidikan</a>
				</li>
				<li><a href="#diklat" data-toggle="tab">Diklat</a>
				</li>
				<li><a href="#kgb" data-toggle="tab">KGB</a>
				</li>
				<li><a href="#instansi" data-toggle="tab">Instansi</a>
				</li>
				<li><a href="#pangkat" data-toggle="tab">Pangkat</a>
				</li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane fade in active" id="skpd">
					<br>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th rowspan="2">SKPD</th>
								<th rowspan="2">TMT</th>
								<th colspan="3" class="text-center">Jabatan</th>
							</tr>
							<tr>
								<th class="text-center">Nama Jabatan</th>
								<th>TMT</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($pnsstruktural as $key=>$value)
							<tr>
								<td>{{$value->skpd}}</td>
								<td>{{$value->skpdstartdate}}</td>
								<td>{{$value->jabatan}}</td>
								<td>{{$value->jabatanstartdate}}</td>
								<td>
									@if($key == 0)
									<button class="btn btn-success" type="button" data-toggle="modal" data-target="#strukturalAdd">Update Jabatan</button>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#skpdAdd">Update SKPD</button>
				</div>
				<div class="tab-pane fade" id="fungsional">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Nama Jabatan</th>
								<th>TMT</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($pnsfungsional as $key => $value)
							<tr>
								<td>{{$value->nama}}</td>
								<td>{{$value->startdate}}</td>
								<td>
									{{label($value->aktif)}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fungsionalAdd">Update Jabatan Fungsional</button>
				</div>
				<div class="tab-pane fade" id="pendidikan">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Jenis Pendidikan</th>
								<th>Tahun Lulus</th>
							</tr>
						</thead>
						<tbody>
							@foreach($pnspendidikan as $key => $value)
							<tr>
								<td>{{$value->jenis}}</td>
								<td>{{$value->lulus}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pendidikanAdd">Update pendidikan</button>
				</div>
				<div class="tab-pane fade" id="diklat">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Nama Diklat</th>
								<th>Tahun Diklat</th>
							</tr>
						</thead>
						<tbody>
							@foreach($pnsdiklat as $key => $value)
							<tr>
								<td>{{$value->nama}}</td>
								<td>{{$value->tahun}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#diklatAdd">Update diklat</button>
				</div>
				<div class="tab-pane fade" id="kgb">
					
				</div>
				<div class="tab-pane fade" id="instansi">
					<div class="row">
						<div class="col-lg-6">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Instansi Induk</th>
										<th>TMT</th>
									</tr>
								</thead>
								<tbody>
									@foreach($pnsinstansiinduk as $key => $value)
									<tr>
										<td>{{$value->nama}}</td>
										<td>{{$value->startdate}}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="col-lg-6">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Instansi Kerja</th>
										<th>TMT</th>
									</tr>
								</thead>
								<tbody>
									@foreach($pnsinstansikerja as $key => $value)
									<tr>
										<td>{{$value->nama}}</td>
										<td>{{$value->startdate}}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insIndukAdd">Update Instansi Induk</button>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insKerjaAdd">Update Instansi Kerja</button>
				</div>
				<div class="tab-pane fade" id="pangkat">
					<table class="table table-hover">
						<thead>
							<tr>
							<th>Pangkat</th>
								<th>TMT</th>
							</tr>
						</thead>
						<tbody>
							@foreach($pnspangkat as $key => $value)
							<tr>
								<td>{{$value->golongan}}</td>
								<td>{{$value->startdate}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pangkatAdd">Update Pangkat</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="skpdAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Perbarui Data SKPD PNS</h4>
			</div>
			{{ Form::open(array('url' => url('data/pns/'.$pns->id.'/skpd'), 'role' => 'form')) }}
			<div class="modal-body">
				<div class="form-group">
					<label>SKPD</label>
					<select class="form-control" name="skpd">
						{{selectSKPD()}}
					</select>
				</div>
				<div class="form-group">
					<label>TMT</label>
					<input type="text" class="form-control datepicker" name="tmt">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Tambahkan</button>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

<div class="modal fade" id="fungsionalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Perbarui Data Jabatan Fungsional PNS</h4>
			</div>
			{{ Form::open(array('url' => url('data/pns/'.$pns->id.'/jabatan-fungsional'), 'role' => 'form')) }}
			<div class="modal-body">
				<div class="form-group">
					<label>Jabatan Fungsional</label>
					<select class="form-control" name="fungsional">
						{{selectFungsional()}}
					</select>
				</div>
				<div class="form-group">
					<label>TMT</label>
					<input type="text" class="form-control datepicker" name="tmt">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Tambahkan</button>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

<div class="modal fade" id="strukturalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Perbarui Data Jabatan Struktural PNS</h4>
			</div>
			{{ Form::open(array('url' => url('data/pns/'.$pnsstruktural{0}->current.'/jabatan-struktural'), 'role' => 'form')) }}
			<div class="modal-body">
				<div class="form-group">
					<label>Jabatan Struktural</label>
					<select class="form-control" name="struktural">
						{{selectStruktural($pnsstruktural{0}->skpdid)}}
					</select>
				</div>
				<div class="form-group">
					<label>TMT</label>
					<input type="text" class="form-control datepicker" name="tmt">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Tambahkan</button>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

<div class="modal fade" id="pendidikanAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Perbarui Data Pendidikan PNS</h4>
			</div>
			{{ Form::open(array('url' => url('data/pns/'.$pns->id.'/pendidikan'), 'role' => 'form')) }}
			<div class="modal-body">
				<div class="form-group">
					<label>Pendidikan</label>
					<select class="form-control" name="pendidikan">
						{{selectPendidikan()}}
					</select>
				</div>
				<div class="form-group">
					<label>Tahun Lulus</label>
					<input type="text" class="form-control" name="tahun">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Tambahkan</button>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

<div class="modal fade" id="diklatAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Perbarui Data Pendidikan PNS</h4>
			</div>
			{{ Form::open(array('url' => url('data/pns/'.$pns->id.'/diklat'), 'role' => 'form')) }}
			<div class="modal-body">
				<div class="form-group">
					<label>Diklat</label>
					<select class="form-control" name="diklat">
						{{selectDiklat()}}
					</select>
				</div>
				<div class="form-group">
					<label>Tahun</label>
					<input type="text" name="tahun" class="form-control">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Tambahkan</button>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

<div class="modal fade" id="insIndukAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Perbarui Data Instansi Induk PNS</h4>
			</div>
			{{ Form::open(array('url' => url('data/pns/'.$pns->id.'/instansi-induk'), 'role' => 'form')) }}
			<div class="modal-body">
				<div class="form-group">
					<label>Instansi Induk</label>
					<select class="form-control" name="instansi">
						{{selectInstansi()}}
					</select>
				</div>
				<div class="form-group">
					<label>TMT</label>
					<input type="text" class="form-control datepicker" name="tmt">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Tambahkan</button>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

<div class="modal fade" id="insKerjaAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Perbarui Data Instansi Kerja PNS</h4>
			</div>
			{{ Form::open(array('url' => url('data/pns/'.$pns->id.'/instansi-kerja'), 'role' => 'form')) }}
			<div class="modal-body">
				<div class="form-group">
					<label>Instansi Kerja</label>
					<select class="form-control" name="instansi">
						{{selectInstansi()}}
					</select>
				</div>
				<div class="form-group">
					<label>TMT</label>
					<input type="text" class="form-control datepicker" name="tmt">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Tambahkan</button>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

<div class="modal fade" id="pangkatAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Perbarui Data Pangkat PNS</h4>
			</div>
			{{ Form::open(array('url' => url('data/pns/'.$pns->id.'/pangkat'), 'role' => 'form')) }}
			<div class="modal-body">
				<div class="form-group">
					<label>Pangkat</label>
					<select class="form-control" name="pangkat">
						{{selectPangkat()}}
					</select>
				</div>
				<div class="form-group">
					<label>TMT</label>
					<input type="text" class="form-control datepicker" name="tmt">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Tambahkan</button>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

@stop

@section('addjs')
@stop