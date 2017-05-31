@section('title')
<h1 class="page-header">Berita Terbaru</h1>
@stop

@section('content')
<div class="col-lg-12">
	@foreach($berita as $key=>$value)
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>{{$value->judul}}</h4>
		</div>
		<div class="panel-body">
			<p>{{highlight($value->isi)}}</p>
			<a href="{{url('berita/'.$value->id)}}" class="pull-right" target="_blank">Selengkapnya >></a>
		</div>
		<!-- /.panel-body -->
	</div>
	@endforeach
</div>
@stop

@section('addjs')
@stop