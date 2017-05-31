@section('title')
<h1 class="page-header">Edit Data Pendidikan</h1>
@stop

@section('content')
<div class="col-lg-12">
	{{ Form::open(array('url' => url('data/pendidikan/'.$pendidikan->id), 'method'=>'put', 'role' => 'form')) }}
		<div class="form-group">
			<label>Jenis Pendidikan</label>
			<input class="form-control" type="text" name="jenis" value="{{$pendidikan->jenis}}">
			<p class="help-block">Misalkan S1, S2, S3, dll.</p>
		</div>
		<button type="submit" class="btn btn-primary">Perbarui</button>
	{{ Form::close()}}
</div>
@stop

@section('addjs')
@stop