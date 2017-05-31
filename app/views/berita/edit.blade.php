@section('title')
<h1 class="page-header">Edit Berita</h1>
@stop

@section('content')
<div class="col-lg-12">
	{{ Form::open(array('url' => url('berita/'.$berita->id), 'role' => 'form', "method" => "PUT")) }}
		<div class="form-group">
			<label>Judul</label>
			<input class="form-control" type="text" name="judul" value="{{$berita->judul}}">
		</div>
		<div class="form-group">
			<label>Isi berita</label>
			<textarea id="isiberita" name="isi">{{$berita->isi}}</textarea>
		</div>
		<button type="submit" class="btn btn-primary">Perbarui</button>
		<br>
		<br>
		<br>
		<br>
	{{ Form::close()}}
</div>
@stop

@section('addjs')
{{HTML::script('assets/bower_components/ckeditor/ckeditor.js')}}
<script type="text/javascript">
	CKEDITOR.replace( 'isiberita' );
</script>
@stop