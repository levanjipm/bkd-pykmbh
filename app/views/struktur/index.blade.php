@section('1js')
<style>
	table.google-visualization-orgchart-table {
		border-collapse: separate !important;
	}
</style>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
	@if(!is_null($struktur))
	google.load("visualization", "1", {packages:["orgchart"]});
	google.setOnLoadCallback(drawChart);
	function drawChart() {
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Name');
		data.addColumn('string', 'Manager');
		data.addColumn('string', 'ToolTip');

		data.addRows([
			@foreach($struktur as $key=>$value)
			[{v:"{{$value[0]['v']}}", f:"{{$value[0]['f']}}"}, "{{$value[1]}}", "{{$value[2]}}"],
			@endforeach
			]);

		var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
		chart.draw(data, {allowHtml:true});
	}
	@endif
</script>
@stop

@section('title')
<h1 class="page-header">Struktur Organisasi</h1>
@stop

@section('content')
<div class="col-lg-12">
	<div class="row text-center">
		{{ Form::open(array('url' => url('struktur-organisasi'), 'role' => 'form', 'onsubmit' => 'return selectSKPD()')) }}
		<div class="col-lg-4 col-lg-offset-3 text-center">
			<select name="skpd" class="chosen-select form-control" id="selectz">
				<option value="">Pilih SKPD</option>
				@foreach($skpd as $key=>$value)
				<option value="{{$value->id}}" {{($select==$value->id)?'selected':''}}>{{$value->nama}}</option>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Perbarui Data Instansi Induk PNS</h4>
			</div>
			<div class="modal-body" id="theform">
			</div>
		</div>
	</div>
</div>


@stop

@section('addjs')

<script type="text/javascript">

var url = window.location.href;

var parts = url.split('/');

// console.log(parts);

var target = "";

var allow = false;

for (var i = parts.length - 1; i >= 0; i--) 
{
	if (parts[i]==window.location.host) 
		break;

	if (parts[i+1] == 'struktur-organisasi') 
		allow = true;

	if (allow) 
		target = parts[i]+'/'+target;
}

target = window.location.protocol+"//"+window.location.host+'/'+target;

function  ganti(id) 
{

	$.ajax({
			type    : 'get',
			url     : target+"ganti-pejabat/"+id,
			success :function(result)
			{
				$("#theform").html(result);
				$('#myModal').modal();
			}
		});
	
}

function selectSKPD () 
{
	var datas = $('form').serialize()
	
	datas = datas.split('&');

	var skpd = datas[1].split('=')[1];

	window.location.assign(target+'struktur-organisasi/'+skpd)

	return false;
}

</script>

@stop