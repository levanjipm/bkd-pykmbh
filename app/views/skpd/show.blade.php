@section('title')
<h1 class="page-header">Data SKPD</h1>
@stop

@section('content')
<div class="col-lg-3">
	<div class="form-group">
		<label>Nama SKPD</label>
		<p>{{$skpd->nama}}</p>
	</div>
	<div class="form-group">
		<label>SKPD induk</label>
		@if($skpd->induk)
		<p>{{$skpd->induk->nama}}</p>
		@else
		<p>Tidak ada</p>
		@endif
	</div>
	<a href="{{url('/data/skpd/'.$skpd->id.'/edit')}}" type="submit" class="btn btn-success pull-right">Edit</a>
</div>
<div class="col-lg-9">
	<div class="panel-body">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#home" data-toggle="tab">Unit bawahan</a>
			</li>
			<li><a href="#profile" data-toggle="tab">Jabatan</a>
			</li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane fade in active" id="home">
				<br>
				@if($skpd->anak->count() > 0)
				<ol>
					@foreach($skpd->anak as $key=> $value)
					<li><a href="{{url('data/skpd/'.$value->id)}}">{{$value->nama}}</a></li>
					@endforeach
				</ol>
				@else
				<p>SKPD tidak memiliki unit bawahan</p>
				@endif
			</div>
			<div class="tab-pane fade" id="profile">
				<br>
				@if($skpd->jabatan->count() > 0)
				<ol>
					@foreach($skpd->jabatan as $key=> $value)
					<li><a href="{{url('data/jabatan-struktural/'.$value->jabatan['id'])}}">{{$value->jabatan['nama']}}</a></li>
					@endforeach
				</ol>
				@else
				<p>Belum ada jabatan struktural yang terdaftar</p>
				@endif
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambahkan jabatan</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Tambah Jabatan Struktural</h4>
			</div>
			{{ Form::open(array('url' => url('data/skpd/'.$skpd->id.'/jabatan'), 'role' => 'form')) }}
			<div class="modal-body">
				<div class="form-group">
					<label>Jabatan</label>
					<select class="form-control" name="jabatan">
						@foreach($struktural as $key=>$value)
						<option value="{{$value->id}}">{{$value->nama}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Tambahkan</button>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop

@section('addjs')
@stop