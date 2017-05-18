@section('1js')
<style>
	table.google-visualization-orgchart-table {
		border-collapse: separate !important;
	}
</style>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
	google.load("visualization", "1", {packages:["orgchart"]});
	google.setOnLoadCallback(drawChart);
	function drawChart() {
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Name');
		data.addColumn('string', 'Manager');
		data.addColumn('string', 'ToolTip');

		data.addRows({{$struktur}});

		var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
		chart.draw(data, {allowHtml:true});
	}
</script>
@stop

@section('title')
<h1 class="page-header">Struktur Organisasi</h1>
@stop

@section('content')
<div class="col-lg-12">
	<div class="row text-center">
		{{ Form::open(array('url' => url('struktur-organisasi'), 'role' => 'form')) }}
		<div class="col-lg-4 col-lg-offset-3 text-center">
			<select name="skpd" class="chosen-select form-control">
				<option value="">Pilih SKPD</option>
				@foreach($skpd as $key=>$value)
				<option value="{{$value->id}}">{{$value->nama}}</option>
				@endforeach
			</select>
			<button type="submit" class="text-center btn btn-primary pull-right">Lihat</button>
		</div>
		<div class="col-lg-1">
		</div>
		{{Form::close()}}
	</div>
	<br>
	<div class="row">
		<div class="col-lg-12">
			@if($skpd)
			<div id="chart_div">
			
			</div>
			@else
			@endif
		</div>
	</div>
</div>
{{uploadModal(url('data/pns/import'))}}
@stop

@section('addjs')

@stop