@section('title')
<h1 class="page-header">Tambah Berita</h1>
@stop

@section('content')
<div class="col-lg-12">
	{{ Form::open(array('url' => url('berita'), 'role' => 'form')) }}
		<div class="form-group">
			<label>Judul</label>
			<input class="form-control" type="text" name="judul">
		</div>
		<div class="form-group">
			<label>Isi berita</label>
			<textarea id="isiberita" name="isi"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Tambah</button>
		<button type="reset" class="btn btn-default">Reset</button>
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