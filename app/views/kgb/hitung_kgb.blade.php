@extends('layouts.master')
@section('title')
<h1 class="page-header">KENAIKAN GAJI BERKALA</h1>
@stop

@section('content')
<div class="col-lg-12">
	<div class="row">
		<div class='form-group'>
			<div class='form-label'>
				<label for='skpd'>SKPD/Unit Kerja</label>
			</div>
			<div class='form-input'>
				{{ Form::select('skpd', array('all' => 'Semua') + $skpd, null, array('class' => 'form-control', 'id' => 'skpd_id'))}}
			</div>
		</div>

		<div class='form-group'>
			<div class='form-label'>
				<label for='tanggal'>Tanggal Hitung</label>
			</div>
			<div class='form-input'>
				{{ Form::input('date', 'tanggal', $now, array('class' => 'form-control', 'id' => 'tanggal')) }}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-1 pull-left">
			<button onclick="hitung()" class="btn btn-primary pull-left" id="tampilkan">Tampilkan</button>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-12">
			<div class='form-label'>
				<label for='tabel'>Daftar Pegawai yang Sudah Harus Mendapatkan Kenaikan Gaji Berkala</label>
			</div>
			<table class="table table-hover" id="kgb-table">
				<thead>
					<tr>
						<th width="10%">#</th>
						<th>Nama</th>
						<th>NIPBaru</th>
						<th>Tanggal KGB</th>
						<th>Golongan/Pangkat</th>
						<th>SKPD/Unit Kerja</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
	</div>
</div>
{{uploadModal(url('kgb/import'))}}
@stop

@section('addjs')
<script>


		function hitung () 
		{
			$.ajax({
				url: window.location.href,
				type: 'GET',
				dataType: 'json',
				data: {skpd_id: $('#skpd_id').val(), tanggal: $('#tanggal').val()},
			})
			.done(function(response) {
				if (!response.status) {
					alert(response.message);
				} else {
					if (response.data.length > 0) {
						var data = response.data;
						var content = '';
						$('#kgb-table tbody').html('');
						$.each(data, function(index, item) {
							console.log(index);
							content += '<tr>';
							content += '<td>' + (index +1) +'</td>';
							content += '<td>' + item.nama + '</td>';
							content += '<td>' + item.NIPBaru + '</td>';
							content += '<td>' + item.tanggal + '</td>';
							content += '<td>' + item.golongan + '</td>';
							content += '<td>' + item.skpd_nama + '</td>';
							content += '</tr>';
						});
						$('#kgb-table tbody').html(content);
					} else {
						$('#kgb-table tbody').html('');
						alert('data tidak ditemukan');
					}
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
</script>
@stop