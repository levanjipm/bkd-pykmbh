<div class="form-group">
	<label>ID PNS</label>
	{{ Form::select('pnsId', $pns, null, array('class' => 'form-control'))}}
</div>
<div class="form-group">
	<label>Tanggal KGB Baru</label>
	{{ Form::input('date', 'tanggal', null, array('class' => 'form-control')) }}
</div>

{{HTML::style('assets/dist/css/select2.min.css')}}

@section('addjs')
<style type="text/css">
.select2{
	width: 100% !important;
}
</style>
{{HTML::script('assets/dist/js/select2.full.min.js')}}
<script type="text/javascript">
$("select").select2({
	placeholder: "Select PNS",
	allowClear: true
});
</script>
@stop