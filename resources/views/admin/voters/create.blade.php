@extends('admin.admin')

@section('content')

	<h1>Vytvor nového voliča</h1>
	<hr/>
	<!-- http://laravelcollective.com/docs/5.1/html -->
	{!! Form::open(array('url' => 'admin\voters')) !!}

		@include('admin.voters.form',['LabelSubmitButton'=>'Vytvor Voliča'])

	{!! Form::close() !!}
	
	@include('errors.list')

@stop