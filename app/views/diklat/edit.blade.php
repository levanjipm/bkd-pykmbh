@section('title')
<h1 class="page-header">Edit Data Diklat</h1>
@stop

@section('content')
<div class="col-lg-12">
	{{ Form::open(array('url' => url('data/diklat/'.$diklat->id), 'method'=>'put', 'role' => 'form')) }}
		<div class="form-group">
			<label>Nama Diklat</label>
			<input class="form-control" type="text" name="nama" value="{{$diklat->nama}}">
		</div>
		<button type="submit" class="btn btn-primary">Perbarui</button>
	{{ Form::close()}}
</div>
@stop

@section('addjs')
@stop