@section('title')
<h1 class="page-header">Edit Data Jabatan Fungsional</h1>
@stop

@section('content')
<div class="col-lg-12">
	{{ Form::open(array('url' => url('data/jabatan-fungsional/'.$fungsional->id), 'method'=>'put', 'role' => 'form')) }}
		<div class="form-group">
			<label>Nama</label>
			<input type="text" class="form-control" value="{{$fungsional->nama}}" name="nama">
		</div>
		<div class="form-group">
			<label>Jenis</label>
			<select class="form-control" name="jenis">
				<option value="JFT" {{($fungsional->jenis == 'JFT')?'selected':''}}>Tertentu</option>
				<option value="JFU" {{($fungsional->jenis == 'JFU')?'selected':''}}>Umum</option>
			</select>
		</div>
		<button type="submit" class="btn btn-primary">Perbarui</button>
	{{ Form::close()}}
</div>
@stop

@section('addjs')
@stop