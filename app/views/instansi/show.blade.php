@section('title')
<h1 class="page-header">Lihat Data Instansi</h1>
@stop

@section('content')
<div class="col-lg-12">
	{{ Form::open(array('url' => url('data/instansi/'.$instansi->id), 'method' => 'put', 'role' => 'form')) }}
		<div class="form-group">
			<label>Nama Instansi</label>
			<input class="form-control" type="text" name="nama" value="{{$instansi->nama}}" readonly="true">
		</div>
		<button onclick="instansi.go(-1);" class="btn btn-primary">Kembali</button>
	{{ Form::close()}}
</div>
@stop

@section('addjs')
@stop