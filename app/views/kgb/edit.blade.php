@extends('layouts.master')
@section('title')
<h1 class="page-header">Ubah Data KGB</h1>
@stop

@section('content')
<div class="col-lg-12">
	{{ Form::model($kgb, array('route' => array('kgb.update', $kgb->id), 'role' => 'form', 'method' => 'put')) }}
		{{View::make('kgb.form', array('pns'=>$pns))}}
		<button type="submit" class="btn btn-primary">Update</button>
		<button type="reset" class="btn btn-default">Reset</button>
	{{ Form::close()}}
</div>
@stop

@section('addjs')
@stop