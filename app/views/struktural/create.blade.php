@section('title')
<h1 class="page-header">Tambah Data Jabatan Struktural</h1>
@stop

@section('content')
<div class="col-lg-12">
	{{ Form::open(array('url' => url('data/jabatan-struktural'), 'role' => 'form')) }}
		<div class="form-group">
			<label>Nama</label>
			<input type="text" class="form-control" value="" name="nama">
		</div>
		<div class="form-group">
			<label>Eselon</label>
			<select class="form-control" name="eselon">
				@foreach($eselon as $key=>$value)
				<option value="{{$value->id}}">{{$value->eselon}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label>Atasan</label>
			<select class="form-control" name="induk">
				<option value="">Tidak ada</option>
				@foreach($struktural as $key=>$value)
				<option value="{{$value->id}}">{{$value->nama}}</option>
				@endforeach
			</select>
		</div>
		<button type="submit" class="btn btn-primary">Tambah</button>
		<button type="reset" class="btn btn-default">Reset</button>
	{{ Form::close()}}
</div>
@stop

@section('addjs')
@stop