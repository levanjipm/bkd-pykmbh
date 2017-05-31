<!DOCTYPE html>
<html>
<head>
	<!-- Bootstrap Core CSS -->
	{{HTML::style('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}

	<!-- MetisMenu CSS -->
	{{HTML::style('assets/bower_components/metisMenu/dist/metisMenu.min.css')}}

	<!-- Custom CSS -->
	{{HTML::style('assets/dist/css/sb-admin-2.css')}}

	<title></title>
</head>
<body>

	{{ Form::open(array('url' => url('ganti-pejabat/'.$id), 'role' => 'form')) }}

	<div class="form-group">
		<label>PNS</label>
		<select class="form-control" name="pns">
			<option value="">Pilih PNS</option>
			@foreach($pns as $key => $value)
			<option value="{{$value->id}}">{{$value->nama}} / {{$value->NIPBaru}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label>TMT</label>
		<input type="text" class="form-control datepicker" name="tmt">
	</div>
	<hr>
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary">Perbarui</button>

	{{ Form::close() }}



	<!-- jQuery -->
	{{HTML::script('assets/bower_components/jquery/dist/jquery.min.js')}}

	<!-- Bootstrap Core JavaScript -->
	{{HTML::script('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}
{{HTML::script('assets/bower_components/metisMenu/dist/metisMenu.min.js')}}

	<!-- Metis Menu Plugin JavaScript -->

	<!-- Custom Theme JavaScript -->
	{{HTML::script('assets/dist/js/sb-admin-2.js')}}
	{{HTML::script('assets/bower_components/datepicker/js/bootstrap-datepicker.min.js')}}

	<script type="text/javascript">
	$('.datepicker').datepicker({
	    format: 'yyyy-mm-dd'
	});
	</script>

</body>
</html>