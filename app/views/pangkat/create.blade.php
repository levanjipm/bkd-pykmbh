@section('title')
<h1 class="page-header">Tambah Data Pangkat</h1>
@stop

@section('content')
<div class="col-lg-12">
	{{ Form::open(array('url' => url('data/pangkat'), 'role' => 'form')) }}
		<div class="form-group">
			<label>Golongan</label>
			<input class="form-control" type="text" name="golongan">
		</div>
		<div class="form-group">
			<label>Ruang</label>
			<input class="form-control" type="text" name="ruang">
		</div>
		<button type="submit" class="btn btn-primary">Tambah</button>
		<button type="reset" class="btn btn-default">Reset</button>
	{{ Form::close()}}
</div>
@stop

@section('addjs')
@stop