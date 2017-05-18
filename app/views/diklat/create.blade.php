@section('title')
<h1 class="page-header">Tambah Data Diklat</h1>
@stop

@section('content')
<div class="col-lg-12">
	{{ Form::open(array('url' => url('data/diklat'), 'role' => 'form')) }}
		<div class="form-group">
			<label>Nama Diklat</label>
			<input class="form-control" type="text" name="nama" value="{{Input::old('nama')}}">
		</div>
		<div class="form-group">
			<label>Tahun</label>
			<input class="form-control" type="text" name="tahun" value="{{Input::old('tahun')}}">
			<p class="help-block">Tahun pelaksanaan Diklat.</p>
		</div>
		<button type="submit" class="btn btn-primary">Tambah</button>
		<button type="reset" class="btn btn-default">Reset</button>
	{{ Form::close()}}
</div>
@stop

@section('addjs')
@stop