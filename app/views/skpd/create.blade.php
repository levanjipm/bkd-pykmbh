@section('title')
<h1 class="page-header">Tambah Data SKPD</h1>
@stop

@section('content')
<div class="col-lg-12">
	{{ Form::open(array('url' => url('data/skpd'), 'role' => 'form')) }}
		<div class="form-group">
			<label>Nama SKPD</label>
			<input class="form-control" type="text" name="nama">
		</div>
		<div class="form-group">
			<label>SKPD Induk</label>
			<select class="chosen-select form-control" name="induk">
				<option value="">Tidak ada</option>
				@foreach($skpd as $key=>$value)
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