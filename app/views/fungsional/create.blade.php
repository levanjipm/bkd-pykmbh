@section('title')
<h1 class="page-header">Tambah Data Jabatan Fungsional</h1>
@stop

@section('content')
<div class="col-lg-12">
	{{ Form::open(array('url' => url('data/jabatan-fungsional'), 'role' => 'form')) }}
		<div class="form-group">
			<label>Nama</label>
			<input type="text" class="form-control" value="" name="nama">
		</div>
		<div class="form-group">
			<label>Jenis</label>
			<select class="form-control" name="jenis">
				<option value="tertentu">Tertentu</option>
				<option value="umum">Umum</option>
			</select>
		</div>
		<button type="submit" class="btn btn-primary">Tambah</button>
		<button type="reset" class="btn btn-default">Reset</button>
	{{ Form::close()}}
</div>
@stop

@section('addjs')
@stop