@section('title')
<h1 class="page-header">Data Jabatan Struktural</h1>
@stop

@section('content')
<div class="col-lg-12">
	<div class="row">
		<div class="col-lg-4">
			{{ Form::open(array('url' => url('login'), 'role' => 'form')) }}
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Pencarian">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
				</span>
			</div><!-- /input-group -->
			{{Form::close()}}
		</div>
		<div class="col-lg-1 pull-right">
			<a href="{{url('data/jabatan-struktural/create')}}" class="btn btn-primary pull-right">Tambah</a>
		</div>
		<div class="col-lg-1 pull-right">
			<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#import">Import</button>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th width="10%">#</th>
						<th>Nama</th>
						<th>Eselon</th>
						<th>Dibuat Tanggal</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($struktural as $key=>$value)
					<tr>
						<td>{{$key+1}}</td>
						<td>{{$value->nama}}</td>
						<td>{{$value->eselon_angka}} {{$value->eselon_huruf}}</td>
						<td>{{tanggal($value->created_at)}}</td>
						<td align="right">
							{{ Form::open(array('url' => url("data/jabatan-struktural/$value->id"), 'method' => 'delete')) }}
							<a href="{{url('data/jabatan-struktural/'.$value->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-eye"></i></a>
							<a href="{{url('data/jabatan-struktural/'.$value->id.'/edit')}}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
							<button class="btn btn-danger"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="Hapus"></i></button>
							{{ Form::close()}}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
{{uploadModal(url('data/jabatan-struktural/import'))}}
@stop

@section('addjs')
@stop