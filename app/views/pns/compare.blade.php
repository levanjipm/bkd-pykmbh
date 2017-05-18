@section('title')
<h1 class="page-header">Data PNS</h1>
@stop

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-lg-12">
						<h4>Pencarian</h4>
					</div>
				</div>
			</div>
			<div class="panel-body">
				{{ Form::open(array('url' => url('data/pns/banding'), 'role' => 'form')) }}
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Pendidikan</label>
							<select class="form-control chosen-select" name="pendidikan">
								<option value=""></option>
								@foreach($pendidikan as $key => $value)
								<option value="{{$value->id}}">{{$value->jenis}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Diklat</label>
							<select class="form-control chosen-select" name="Diklat">
								<option value=""></option>
								@foreach($diklat as $key => $value)
								<option value="{{$value->id}}">{{$value->nama}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Golongan/Pangkat</label>
							<select class="form-control chosen-select" name="pangkat">
								<option value=""></option>
								@foreach($pangkat as $key => $value)
								<option value="{{$value->id}}">{{$value->golongan}}/{{$value->ruang}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Jabatan Fungsional</label>
							<select class="form-control chosen-select" name="fungsional">
								<option value=""></option>
								@foreach($fungsional as $key => $value)
								<option value="{{$value->id}}">{{$value->nama}} (Jabatan Fungsional {{$value->jenis}})</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>SKPD / Unit Kerja</label>
							<select class="form-control chosen-select" name="skpd">
								<option value=""></option>
								@foreach($skpd as $key => $value)
								<option value="{{$value->id}}">{{$value->nama}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<button type="submit" class="btn btn-primary pull-right">Cari</button>
					</div>
				</div>
				{{ Form::close()}}
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<table class="table table-striped table-bordered">
					<tr>
						<td width="40%">
							<select class="chosen-select form-control">
								<option>Saya</option>
								<option>Kamu</option>
							</select>
						</td>
						<td width="20%"></td>
						<td width="40%">
							<select class="chosen-select form-control">
								<option>Saya</option>
								<option>Kamu</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>James Bond</td>
						<td class="text-center"><strong>Nama</strong></td>
						<td>Saras</td>
					</tr>
					<tr>
						<td>007</td>
						<td class="text-center"><strong>NIP Baru</strong></td>
						<td>008</td>
					</tr>
					<tr>
						<td>235</td>
						<td class="text-center"><strong>NIP Lama</strong></td>
						<td>236</td>
					</tr>
					<tr>
						<td>H</td>
						<td class="text-center"><strong>Gelar Depan</strong></td>
						<td>Hj</td>
					</tr>
					<tr>
						<td>sdf</td>
						<td class="text-center"><strong>Gelar Belakang</strong></td>
						<td>sdf</td>
					</tr>
					<tr>
						<td>Bandung</td>
						<td class="text-center"><strong>Tempat Lahir</strong></td>
						<td>Bandung</td>
					</tr>
					<tr>
						<td>1 Januari 1990</td>
						<td class="text-center"><strong>Tanggal Lahir</strong></td>
						<td>2 Januari 1989</td>
					</tr>
					<tr>
						<td>Pria</td>
						<td class="text-center"><strong>Jenis Kelamin</strong></td>
						<td>Wanita</td>
					</tr>
					<tr>
						<td>Bandung</td>
						<td class="text-center"><strong>Agama</strong></td>
						<td>Bandung</td>
					</tr>
					<tr>
						<td>Bandung</td>
						<td class="text-center"><strong>Kedudukan Hukum</strong></td>
						<td>Bandung</td>
					</tr>
					<tr>
						<td>Bandung</td>
						<td class="text-center"><strong>Golongan / Pangkat</strong></td>
						<td>Bandung</td>
					</tr>
					<tr>
						<td>Bandung</td>
						<td class="text-center"><strong>Jabatan Fungsional</strong></td>
						<td>Bandung</td>
					</tr>
					<tr>
						<td>Bandung</td>
						<td class="text-center"><strong>SKPD</strong></td>
						<td>Bandung</td>
					</tr>
					<tr>
						<td>Bandung</td>
						<td class="text-center"><strong>Unit Kerja</strong></td>
						<td>Bandung</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
@stop

@section('addjs')
<script type="text/javascript">
	$.ajax({
		data    : {dest : dest}, 
		type    : 'post',
		url     : window.location.protocol+"//"+window.location.host+"/getapicost",
		beforeSend: function() {
			$("#couriers").append(load);
		},
		success :function(result){
			$("#couriers").empty();
			$("#couriers").append(result);
			var sign = 1;
			$('input:radio[name="courier"]').change(function(){
				sign = sign-1;
				if(sign==0)
				{
					$("#ttcontainer").removeProp("data-toggle");
					$("#ttcontainer").removeProp("data-placement");
					$("#ttcontainer").removeProp("title");
					$("#submit").prop("disabled", false);
					$("#submit").removeProp("data-original-title");
					$("#submit").removeProp("title");
				}
			});
		}
	});
</script>

@stop