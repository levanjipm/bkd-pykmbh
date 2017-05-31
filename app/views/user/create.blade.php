@section('title')
<h1 class="page-header">Tambah User</h1>
@stop

@section('content')
<div class="col-lg-12">
	{{ Form::open(array('url' => url('user'), 'role' => 'form')) }}
	<div class="form-group">
		<label>Email</label>
		<input type="text" class="form-control" value="" name="email">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" class="form-control" value="" name="password">
	</div>
	<div class="form-group">
		<label>Konfirmasi password</label>
		<input type="password" class="form-control" value="" name="cpassword">
	</div>
	<div class="form-group">
	<label>Hak akses</label>
		<div class="checkbox">
			<label>
				<input type="radio" name="admin" value="1">Admin
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="radio" name="admin" value="0" checked="true">Viewer
			</label>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Tambah</button>
	<button type="reset" class="btn btn-default">Reset</button>
	{{ Form::close()}}
</div>
@stop

@section('addjs')
@stop