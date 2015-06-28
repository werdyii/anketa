@extends('admin.admin')

@section('content')

	<h1>Vytvor novú anketu</h1>
	<hr/>
	<!-- http://laravelcollective.com/docs/5.1/html -->
	{!! Form::open(array('url' => 'admin/polls')) !!}

		@include('admin.polls.form',['LabelSubmitButton'=>'Vytvor anketu'])

	{!! Form::close() !!}
	
	@include('errors.list')

@stop