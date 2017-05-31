@section('title')
<h1 class="page-header">Edit Data Pangkat</h1>
@stop

@section('content')
<div class="col-lg-12">
	{{ Form::open(array('url' => url('data/pangkat/'.$pangkat->id), 'method'=>'put', 'role' => 'form')) }}
		<div class="form-group">
			<label>Golongan/Ruang</label>
			<input class="form-control" type="text" name="golongan" value="{{$pangkat->golongan}}">
		</div>
		<button type="submit" class="btn btn-primary">Perbarui</button>
	{{ Form::close()}}
</div>
@stop

@section('addjs')
@stop