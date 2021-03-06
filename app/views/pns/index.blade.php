@section('title')
<h1 class="page-header">Data PNS</h1>
@stop

@section('content')
<div class="col-lg-12">
	<div class="row">
		<div class="col-lg-4">
			{{ Form::open(array('url' => url('data/pns/cari'), 'role' => 'form', 'method' => 'get')) }}
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
			<a href="{{url('data/pns/create')}}" class="btn btn-primary pull-right">Tambah</a>
		</div>
		<div class="col-lg-1 pull-right">
			<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#import">Import</button>
		</div>
		@endif
	</div>
	<br>
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th width="5%">#</th>
						<th width="18%">NIP</th>
						<th width="25%">Nama</th>
						<th width="25%">SKPD</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($pns as $key=>$value)
					<tr>
						<td>{{(($pns->getCurrentPage()-1)*20)+$key+1}}</td>
						<td>{{$value->nipbaru}}</td>
						<td>{{$value->nama}}</td>
						<td>{{$value->skpd}}</td>
						<td align="right">
							{{ Form::open(array('url' => url("data/pns/$value->id"), 'method' => 'delete')) }}
							<a href="{{url('data/pns/'.$value->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-eye"></i></a>
							@if(checkAdmin())
							<a href="{{url('data/pns/'.$value->id.'/edit')}}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
							<button class="btn btn-danger"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="Hapus"></i></button>
							@endif
							{{ Form::close()}}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{$pns->appends(array('keyword' => (isset($keyword))?$keyword:''))->links()}}
		</div>
	</div>
</div>
{{uploadModal(url('data/pns/import'))}}
@stop

@section('addjs')
@stop