@section('title')
<h1 class="page-header">Berita</h1>
@stop

@section('content')
<div class="col-lg-12">
	<div class="row">
		<div class="col-lg-4">
			{{ Form::open(array('url' => url('berita/cari'), 'role' => 'form', 'method' => 'get')) }}
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Pencarian" name="keyword" value="{{(isset($keyword))?$keyword:''}}">
				<span class="input-group-btn">
					<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
				</span>
			</div><!-- /input-group -->
			{{Form::close()}}
		</div>
		@if(checkAdmin())
		<div class="col-lg-1 pull-right">
			<a href="{{url('berita/create')}}" class="btn btn-primary pull-right">Tambah</a>
		</div>
		@endif
	</div>
	<br>
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th width="10%">#</th>
						<th>Judul</th>
						<th>Dibuat Tanggal</th>
						<th width="20%"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($berita as $key=>$value)
					<tr>
						<td>{{(($berita->getCurrentPage()-1)*20)+$key+1}}</td>
						<td>{{$value->judul}}</td>
						<td>{{($value->created_at)}}</td>
						<td align="right">
							{{ Form::open(array('url' => url("berita/$value->id"), 'method' => 'delete')) }}
							<a href="{{url('berita/'.$value->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-eye"></i></a>
							@if(checkAdmin())
							<a href="{{url('berita/'.$value->id.'/edit')}}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
							<button class="btn btn-danger"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="Hapus"></i></button>
							@endif
							{{ Form::close()}}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{$berita->appends(array('keyword' => (isset($keyword))?$keyword:''))->links()}}
		</div>
	</div>
</div>

@stop

@section('addjs')
@stop