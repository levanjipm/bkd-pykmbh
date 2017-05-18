@section('title')
<h1 class="page-header">Tambah Data PNS</h1>
@stop

@section('content')
<div class="col-lg-12">
	{{ Form::open(array('url' => url('data/pns'), 'role' => 'form')) }}
		<div class="form-group">
			<label>NIP Lama</label>
			<input class="form-control" type="text" name="niplama">
		</div>
		<div class="form-group">
			<label>NIP Baru</label>
			<input class="form-control" type="text" name="nipbaru">
		</div>
		<div class="form-group">
			<label>Nama</label>
			<input class="form-control" type="text" name="nama">
		</div>
		<div class="form-group">
			<label>Jenis Kelamin</label>
			<select class="form-control" name="jeniskelamin">
				<option value="1">Pria</option>
				<option value="2">Wanita</option>
			</select>
		</div>
		<div class="form-group">
			<label>Agama</label>
			<input class="form-control" type="text" name="agama">
		</div>
		<div class="form-group">
			<label>Gelar Depan</label>
			<input class="form-control" type="text" name="gelardepan">
		</div>
		<div class="form-group">
			<label>Gelar Belakang</label>
			<input class="form-control" type="text" name="gelarbelakang">
		</div>
		<div class="form-group">
			<label>Tempat Lahir</label>
			<input class="form-control" type="text" name="tempatlahir">
		</div>
		<div class="form-group">
			<label>Tanggal Lahir</label>
			<input class="form-control datepicker" type="text" name="tanggallahir">
		</div>
		<div class="form-group">
			<label>Kedudukan Hukum</label>
			<input class="form-control" type="text" name="hukum">
		</div>
		<div class="form-group">
			<label>Jenis Pegawai</label>
			<input class="form-control" type="text" name="jenis">
		</div>
		<button type="submit" class="btn btn-primary">Tambah</button>
		<button type="reset" class="btn btn-default">Reset</button>
	{{ Form::close()}}
</div>
@stop

@section('addjs')
@stop