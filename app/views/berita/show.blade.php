@section('title')
<h1 class="page-header">{{$berita->judul}}</h1>
@stop

@section('content')
<div class="col-lg-12">
   {{str_replace("&nbsp;", ' ', $berita->isi)}}
</div>
@stop

@section('addjs')

@stop