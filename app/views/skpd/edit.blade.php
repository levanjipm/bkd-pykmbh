@section('title')
<h1 class="page-header">Edit Data SKPD</h1>
@stop

@section('content')
<div class="col-lg-12">
	{{ Form::open(array('url' => url('data/skpd/'.$skpd->id), 'method' => 'put', 'role' => 'form')) }}
		<div class="form-group">
			<label>Nama SKPD</label>
			<input class="form-control" type="text" name="nama" value="{{$skpd->nama}}">
		</div>
		<div class="form-group">
			<label>SKPD Induk</label>
			<select class="chosen-select form-control" name="induk">
				<option value="">Tidak ada</option>
				@foreach($induks as $key=>$value)
				<option value="{{$value->id}}" {{($skpd->indukId == $value->id)?'selected':''}}>{{$value->nama}}</option>
				@endforeach
			</select>
		</div>
		<button type="submit" class="btn btn-primary">Perbarui</button>
	{{ Form::close()}}
</div>
@stop

@section('addjs')
@stop