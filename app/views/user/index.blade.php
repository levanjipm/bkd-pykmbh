@section('title')
<h1 class="page-header">Manajemen User</h1>
@stop

@section('content')
<div class="col-lg-12">
	<div class="row">
		<div class="col-lg-4">
			{{ Form::open(array('url' => url('user/cari'), 'role' => 'form', 'method' => 'get')) }}
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Pencarian" name="keyword" value="{{(isset($keyword))?$keyword:''}}">
				<span class="input-group-btn">
					<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
				</span>
			</div><!-- /input-group -->
			{{Form::close()}}
		</div>
		<div class="col-lg-1 pull-right">
			<a href="{{url('user/create')}}" class="btn btn-primary pull-right">Tambah</a>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th width="10%">#</th>
						<th>Email</th>
						<th>Hak akses</th>
						<th width="20%"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($user as $key=>$value)
					<tr>
						<td>{{(($user->getCurrentPage()-1)*20)+$key+1}}</td>
						<td>{{$value->email}}</td>
						<td>{{admin($value->id)?'<span class="label label-primary">Admin</span>':'<span class="label label-default">Viewer</span>'}}</td>
						<td align="right">
							
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{$user->appends(array('keyword' => (isset($keyword))?$keyword:''))->links()}}
		</div>
	</div>
</div>
@stop

@section('addjs')
@stop