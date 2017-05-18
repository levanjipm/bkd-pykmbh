@section('title')
<h1 class="page-header">Tambah Data Pendidikan</h1>
@stop

@section('content')
<div class="col-lg-12">
	{{ Form::open(array('url' => url('data/pendidikan'), 'role' => 'form')) }}
		<div class="form-group">
			<label>Jenis Pendidikan</label>
			<input class="form-control" type="text" name="jenis">
			<p class="help-block">Misalkan S1, S2, S3, dll.</p>
		</div>
		<button type="submit" class="btn btn-primary">Tambah</button>
		<button type="reset" class="btn btn-default">Reset</button>
	{{ Form::close()}}
</div>
@stop

@section('addjs')
@stop