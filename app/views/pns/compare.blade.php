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
								<option value="">Semua</option>
								@foreach($pendidikan as $key => $value)
								<option value="{{$value->id}}" {{(isset($selectpendidikan) && $selectpendidikan == $value->id)?'selected':''}}>{{$value->jenis}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Diklat</label>
							<select class="form-control chosen-select" name="diklat">
								<option value="">Semua</option>
								@foreach($diklat as $key => $value)
								<option value="{{$value->id}}" {{(isset($selectdiklat) && $selectdiklat == $value->id)?'selected':''}}>{{$value->nama}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Golongan/Pangkat</label>
							<select class="form-control chosen-select" name="pangkat">
								<option value="">Semua</option>
								@foreach($pangkat as $key => $value)
								<option value="{{$value->id}}" {{(isset($selectpangkat) && $selectpangkat == $value->id)?'selected':''}}>{{$value->golongan}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Jabatan Fungsional</label>
							<select class="form-control chosen-select" name="fungsional">
								<option value="">Semua</option>
								@foreach($fungsional as $key => $value)
								<option value="{{$value->id}}" {{(isset($selectfungsional) && $selectfungsional == $value->id)?'selected':''}}>{{$value->nama}} (Jabatan Fungsional {{$value->jenis}})</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>SKPD / Unit Kerja</label>
							<select class="form-control chosen-select" name="skpd">
								<option value="">Semua</option>
								@foreach($skpd as $key => $value)
								<option value="{{$value->id}}" {{(isset($selectskpd) &&  $selectskpd == $value->id)?'selected':''}}>{{$value->nama}}</option>
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
				<table class="table table-striped table-bordered text-center">
					<tr>
						<td width="40%">
							<select class="chosen-select form-control" id="select1" onchange="pnsselect(1)">
								<option value="">Pilih PNS</option>
								@if(!empty($pns))
								@foreach($pns as $key => $value)
								<option value="{{$value->id}}">{{$value->nama}}</option>
								@endforeach
								@endif
							</select>
						</td>
						<td width="20%"></td>
						<td width="40%">
							<select class="chosen-select form-control" id="select2" onchange="pnsselect(2)">
								<option value="">Pilih PNS</option>
								@if(!empty($pns))
								@foreach($pns as $key => $value)
								<option value="{{$value->id}}">{{$value->nama}}</option>
								@endforeach
								@endif
							</select>
						</td>
					</tr>
					<tr>
						<td class="data1" id="pns1nama"></td>
						<td class="text-center"><strong>Nama</strong></td>
						<td class="data2" id="pns2nama"></td>
					</tr>
					<tr>
						<td class="data1" id="pns1nipbaru"></td>
						<td class="text-center"><strong>NIP Baru</strong></td>
						<td class="data2" id="pns2nipbaru"></td>
					</tr>
					<tr>
						<td class="data1" id="pns1niplama"></td>
						<td class="text-center"><strong>NIP Lama</strong></td>
						<td class="data2" id="pns2niplama"></td>
					</tr>
					<tr>
						<td class="data1" id="pns1gelardepan"></td>
						<td class="text-center"><strong>Gelar Depan</strong></td>
						<td class="data2" id="pns2gelardepan"></td>
					</tr>
					<tr>
						<td class="data1" id="pns1gelarbelakang"></td>
						<td class="text-center"><strong>Gelar Belakang</strong></td>
						<td class="data2" id="pns2gelarbelakang"></td>
					</tr>
					<tr>
						<td class="data1" id="pns1tempatlahir"></td>
						<td class="text-center"><strong>Tempat Lahir</strong></td>
						<td class="data2" id="pns2tempatlahir"></td>
					</tr>
					<tr>
						<td class="data1" id="pns1tanggallahir"></td>
						<td class="text-center"><strong>Tanggal Lahir</strong></td>
						<td class="data2" id="pns2tanggallahir"></td>
					</tr>
					<tr>
						<td class="data1" id="pns1jkelamin"></td>
						<td class="text-center"><strong>Jenis Kelamin</strong></td>
						<td class="data2" id="pns2jkelamin"></td>
					</tr>
					<tr>
						<td class="data1" id="pns1agama"></td>
						<td class="text-center"><strong>Agama</strong></td>
						<td class="data2" id="pns2agama"></td>
					</tr>
					<tr>
						<td class="data1" id="pns1hukum"></td>
						<td class="text-center"><strong>Kedudukan Hukum</strong></td>
						<td class="data2" id="pns2hukum"></td>
					</tr>
					<tr>
						<td class="data1" id="pns1pangkat"></td>
						<td class="text-center"><strong>Golongan / Pangkat</strong></td>
						<td class="data2" id="pns2pangkat"></td>
					</tr>
					<tr>
						<td class="data1" id="pns1fungsional"></td>
						<td class="text-center"><strong>Jabatan Fungsional</strong></td>
						<td class="data2" id="pns2fungsional"></td>
					</tr>
					<tr>
						<td class="data1" id="pns1skpd"></td>
						<td class="text-center"><strong>SKPD/Unit Kerja</strong></td>
						<td class="data2" id="pns2skpd"></td>
					</tr>
					<tr>
						<td class="data1" id="pns1pendidikan"></td>
						<td class="text-center"><strong>Pendidikan</strong></td>
						<td class="data2" id="pns2pendidikan"></td>
					</tr>
					<tr>
						<td class="data1" id="pns1diklat"></td>
						<td class="text-center"><strong>Diklat</strong></td>
						<td class="data2" id="pns2diklat"></td>
					</tr>
					<tr>
						<td class="data1" id="pns1instansi"></td>
						<td class="text-center"><strong>Instansi Induk/Instansi Kerja</strong></td>
						<td class="data2" id="pns2instansi"></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
@stop

@section('addjs')
<script type="text/javascript">

var url = window.location.href;

var parts = url.split('/');

// console.log(parts);

var target = "";

var allow = false;

for (var i = parts.length - 1; i >= 0; i--) 
{
	if (parts[i]==window.location.host) 
		break;

	if (parts[i] == 'pns') 
		allow = true;

	if (allow) 
		target = parts[i]+'/'+target;
}

target = window.location.protocol+"//"+window.location.host+'/'+target;

function pnsselect (number) 
{
	if ($('#select'+number).val()!='') 
	{
		$.ajax({
			type    : 'get',
			url     : target+$('#select'+number).val()+"/getcompare",
			// beforeSend: function() {
			// 	$("#couriers").append(load);
			// },
			success :function(result){
				console.log(result);
				$('.data'+number).empty();
				
				if (result.pns.jenisKelamin == 1 )
					var jk = 'Pria';
				else
					var jk = 'Wanita';

				if (result.pendidikan.length > 0) 
				{
					var pendidikan = "";

					for (var i = result.pendidikan.length - 1; i >= 0; i--) 
					{
						var jenis = '';
						
						if (result.pendidikan[i].nama!=null) 
							jenis = " ("+result.pendidikan[i].nama+")";

						pendidikan = pendidikan+result.pendidikan[i].jenis+jenis+" / "+result.pendidikan[i].lulus+"<br>";
					}
				}

				if (result.diklat.length > 0) 
				{
					var diklat = "";

					for (var i = result.diklat.length - 1; i >= 0; i--) 
					{
						diklat = diklat+result.diklat[i].nama+" / "+result.diklat[i].tahun+"<br>";
					}
				}

				if (result.struktural.length > 0) 
				{
					var struktural = "";

					for (var i = result.struktural.length - 1; i >= 0; i--) 
					{
						var jab = '';

						if (result.struktural[i].jabatan != null) 
							jab = ' / '+result.struktural[i].jabatan+' ( '+result.struktural[i].jabatantmt+' )';

						struktural = struktural+result.struktural[i].skpd+jab+"<br>";
					}
				}
				
				$('#pns'+number+'nama').text(result.pns.nama);
				$('#pns'+number+'nipbaru').text(result.pns.NIPBaru);
				$('#pns'+number+'niplama').text(result.pns.NIPLama);
				$('#pns'+number+'gelardepan').text(result.pns.gelarDepan);
				$('#pns'+number+'gelarbelakang').text(result.pns.gelarBelakang);
				$('#pns'+number+'tempatlahir').text(result.pns.tempatLahir);
				$('#pns'+number+'tanggallahir').text(result.pns.tanggalLahir);
				$('#pns'+number+'jkelamin').text(jk);
				$('#pns'+number+'agama').text(result.pns.agama);
				$('#pns'+number+'hukum').text(result.pns.kedudukanHukum);
				$('#pns'+number+'pendidikan').html(pendidikan);
				$('#pns'+number+'diklat').html(diklat);
				$('#pns'+number+'fungsional').html((result.fungsional == null)?'Belum ada':result.fungsional.nama);
				$('#pns'+number+'pangkat').html((result.pangkat.golongan == null)?'Belum ada':result.pangkat.golongan);
				$('#pns'+number+'instansi').html(result.instansiinduk.nama+"/"+result.instansikerja.nama);
				$('#pns'+number+'skpd').html(struktural);
				
			}
		});
	}	
}


</script>

@stop