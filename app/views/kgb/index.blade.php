@extends('layouts.master')
@section('title')
<h1 class="page-header">Daftar KGB</h1>
@stop

@section('content')
<div class="col-lg-12">
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th width="10%">#</th>
						<th>Nama</th>
						<th>NIPBaru</th>
						<th>Tanggal KGB</th>
						<th>Month Diff</th>
						<th>Aktif</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($kgb as $key=>$value)
					<tr>
						<td>{{$key+1}}</td>
						<td>{{$value->nama}}</td>
						<td>{{$value->NIPBaru}}</td>
						<td>{{$value->tanggal}}</td>
						<td>{{$value->diff}}</td>
						<td>{{$value->aktif}}</td>
						<td align="right">
							{{ Form::open(array('url' => url("kgb/$value->id"), 'method' => 'delete')) }}
							<a href="{{url('kgb/'.$value->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-eye"></i></a>
							<a href="{{url('kgb/'.$value->id.'/edit')}}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
							<button class="btn btn-danger"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="Hapus"></i></button>
							{{ Form::close()}}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<div class="col-lg-1 pull-right">
			<a href="{{url('kgb/create')}}" class="btn btn-primary pull-right">Tambah</a>
		</div>
		<div class="col-lg-1 pull-right">
			<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#import">Import</button>
		</div>

	</div>
</div>
{{uploadModal(url('kgb/import'))}}
@stop

@section('addjs')
@stop