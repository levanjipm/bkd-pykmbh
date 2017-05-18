<?php

function tanggal($date)
{
	$bulanlist = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

	$date = substr("$date", 0, 10);

	$tanggal = substr("$date", -2);
	$bulan = $bulanlist[intval(substr("$date", -5, 2))-1];
	$tahun = substr("$date", 0, 4);

	return $tanggal." ".$bulan." ".$tahun;
}

function rmdir_recursive($dir) 
{
	foreach(scandir($dir) as $file) {
		if ('.' === $file || '..' === $file) continue;
		if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
		else unlink("$dir/$file");
	}
	rmdir($dir);
}

function jenisKelamin($jenis)
{
	if ($jenis==1) 
		return 'Pria';
	else
		return 'Wanita';
}

function uploadModal($url)
{
	return '<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Import data</h4>
			</div>
			'.Form::open(array('url' => $url, 'files' => true)).'
			<div class="modal-body">
				<div class="form-group">
					<label>File</label>
					<input class="form-control" type="file" name="file">
					<p class="help-block">Data harus berupa xlsx.</p>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
				<button type="submit" class="btn btn-primary">Import</button>
			</div>
			'.Form::close().'
		</div>
	</div>
</div>';
}

function errorMsg($err)
{
	$properties = array_keys($err);

	$errStr = "Kesalahan pada kolom ";

	foreach ($properties as $key => $value) 
	{
		if ($key>0) 
			$errStr = $errStr.', ';

		$errStr = $errStr.$value;
	}

	return $errStr;
}

function alertShow()
{
	if (Session::has('message') && Session::has('type'))
	{
		$alert = array(
						1 => 'success',
						2 => 'danger',
						3 => 'warning',
						);

		$html = "<div id='notification' class='row navbar-fixed-top' style='z-index: 99999;display:none;' onclick='hideNotif()'><div class='alert alert-".$alert[Session::get('type')]." text-center' role='alert'><h4>".Session::get('message')."</h4></div></div>";

		Session::forget('message');
		Session::forget('type');

		return $html;
	}
}

function selectDiklat()
{
	$diklat = diklat::all();

	$return = '';

	foreach ($diklat as $key => $value) 
	{
		$return = $return."<option value='".$value->id."'>".$value->nama."(tahun ".$value->tahun.")</option>";
	}

	return $return;
}

function selectPendidikan()
{
	$pendidikan = pendidikan::all();

	$return = '';

	foreach ($pendidikan as $key => $value) 
	{
		$return = $return."<option value='".$value->id."'>".$value->jenis."</option>";
	}

	return $return;
}

function selectPangkat()
{
	$pangkat = pangkat::all();

	$return = '';

	foreach ($pangkat as $key => $value) 
	{
		$return = $return."<option value='".$value->id."'>".$value->golongan."/".$value->ruang."</option>";
	}

	return $return;
}

function selectFungsional()
{
	$fungsional = fungsional::all();

	$return = '';

	foreach ($fungsional as $key => $value) 
	{
		$return = $return."<option value='".$value->id."'>".$value->nama."(".$value->jenis.")</option>";
	}

	return $return;
}

function selectSKPD()
{
	$skpd = SKPD::all();

	$return = '';

	foreach ($skpd as $key => $value) 
	{
		$return = $return."<option value='".$value->id."'>".$value->nama."</option>";
	}

	return $return;
}

function selectInstansi()
{
	$instansi = instansi::all();

	$return = '';

	foreach ($instansi as $key => $value) 
	{
		$return = $return."<option value='".$value->id."'>".$value->nama."</option>";
	}

	return $return;
}

function label($status)
{
	if ($status == 1) 
		return "<span class='label label-success'>Aktif</span>";
	else
		return "<span class='label label-default'>Tidak Aktif</span>";
}

?>