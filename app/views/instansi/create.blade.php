@section('title')
<h1 class="page-header">Tambah Data Instansi</h1>
@stop

@section('content')
<div class="col-lg-12">
	{{ Form::open(array('url' => url('data/instansi'), 'role' => 'form')) }}
		<div class="form-group">
			<label>Nama Instansi</label>
			<input class="form-control" type="text" name="nama">
		</div>
		<button type="submit" class="btn btn-primary">Tambah</button>
		<button type="reset" class="btn btn-default">Reset</button>
	{{ Form::close()}}
</div>
@stop

@section('addjs')
@stop