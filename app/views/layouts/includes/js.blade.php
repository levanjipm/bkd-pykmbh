 <!-- jQuery -->
{{HTML::script('assets/bower_components/jquery/dist/jquery.min.js')}}

<!-- Bootstrap Core JavaScript -->
{{HTML::script('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}

<!-- Metis Menu Plugin JavaScript -->
{{HTML::script('assets/bower_components/metisMenu/dist/metisMenu.min.js')}}

{{HTML::script('assets/bower_components/chosen/chosen.jquery.min.js')}}

<!-- Custom Theme JavaScript -->
{{HTML::script('assets/dist/js/sb-admin-2.js')}}

{{HTML::script('assets/bower_components/datepicker/js/bootstrap-datepicker.min.js')}}

<script type="text/javascript">
	$(".chosen-select").chosen();

	$('.datepicker').datepicker({
	    format: 'yyyy-mm-dd'
	});
</script>