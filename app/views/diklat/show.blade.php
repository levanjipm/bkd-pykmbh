@section('title')
<h1 class="page-header">Lihat Data Diklat</h1>
@stop

@section('content')
<div class="col-lg-12">
	{{ Form::open(array('url' => url('data/diklat/'.$diklat->id), 'method'=>'put', 'role' => 'form')) }}
		<div class="form-group">
			<label>Nama Diklat</label>
			<input class="form-control" type="text" name="nama" value="{{$diklat->nama}}" readonly="true">
			<button onclick="diklat.go(-1);" class="btn btn-primary">Kembali</button>
		</div>
	{{ Form::close()}}
</div>
@stop

@section('addjs')
@stop