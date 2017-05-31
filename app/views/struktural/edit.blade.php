@section('title')
<h1 class="page-header">Edit Data Jabatan Struktural</h1>
@stop

@section('content')
<div class="col-lg-12">
	{{ Form::open(array('url' => url('data/jabatan-struktural/'.$struktural->id), 'method' => 'put', 'role' => 'form')) }}
		<div class="form-group">
			<label>Nama</label>
			<input type="text" class="form-control" name="nama" value="{{$struktural->nama}}">
		</div>
		<div class="form-group">
			<label>Eselon</label>
			<select class="form-control" name="eselon">
				<option value="">Pilih eselon</option>
				@foreach($eselon as $key=>$value)
				<option value="{{$value->id}}" {{($value->id == $struktural->eselonId)?'selected':''}}>{{$value->eselon}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label>Atasan</label>
			<select class="form-control" name="induk">
				<option value="">Tidak ada</option>
				@foreach($atasan as $key=>$value)
				<option value="{{$value->id}}" {{($value->id == $struktural->id)?'selected':''}}>{{$value->nama}}</option>
				@endforeach
			</select>
		</div>
		<button type="submit" class="btn btn-primary">Perbarui</button>
	{{ Form::close()}}
</div>
@stop

@section('addjs')
@stop