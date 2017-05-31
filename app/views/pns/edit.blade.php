@section('title')
<h1 class="page-header">Edit Data PNS</h1>
@stop

@section('content')
<div class="col-lg-12">
	{{ Form::open(array('url' => url('data/pns/'.$pns->id), 'role' => 'form', 'method' => 'PUT')) }}
		<div class="form-group">
			<label>NIP Lama</label>
			<input class="form-control" type="text" name="niplama" value="{{$pns->NIPLama}}">
		</div>
		<div class="form-group">
			<label>NIP Baru</label>
			<input class="form-control" type="text" name="nipbaru" value="{{$pns->NIPBaru}}">
		</div>
		<div class="form-group">
			<label>Nama</label>
			<input class="form-control" type="text" name="nama" value="{{$pns->nama}}">
		</div>
		<div class="form-group">
			<label>Jenis Kelamin</label>
			<select class="form-control" name="jeniskelamin">
				<option value="1" {{($pns->jenisKelamin == 1)?'selected':''}}>Pria</option>
				<option value="2" {{($pns->jenisKelamin == 2)?'selected':''}}>Wanita</option>
			</select>
		</div>
		<div class="form-group">
			<label>Agama</label>
			<input class="form-control" type="text" name="agama" value="{{$pns->agama}}">
		</div>
		<div class="form-group">
			<label>Gelar Depan</label>
			<input class="form-control" type="text" name="gelardepan" value="{{$pns->gelarDepan}}">
		</div>
		<div class="form-group">
			<label>Gelar Belakang</label>
			<input class="form-control" type="text" name="gelarbelakang" value="{{$pns->gelarBelakang}}">
		</div>
		<div class="form-group">
			<label>Tempat Lahir</label>
			<input class="form-control" type="text" name="tempatlahir" value="{{$pns->tempatLahir}}">
		</div>
		<div class="form-group">
			<label>Tanggal Lahir</label>
			<input class="form-control datepicker" type="text" name="tanggallahir" value="{{$pns->tanggalLahir}}">
		</div>
		<div class="form-group">
			<label>Kedudukan Hukum</label>
			<input class="form-control" type="text" name="hukum" value="{{$pns->kedudukanHukum}}">
		</div>
		<div class="form-group">
			<label>Jenis Pegawai</label>
			<input class="form-control" type="text" name="jenis" value="{{$pns->jenisPegawai}}">
		</div>
		<button type="submit" class="btn btn-primary">Perbarui</button>
	{{ Form::close()}}
</div>
@stop

@section('addjs')
@stop