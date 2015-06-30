@extends('admin.admin')

@section('content')

	<h1>Vytvor novú anketu</h1>
	<hr/>
	<!-- http://laravelcollective.com/docs/5.1/html -->
	{!! Form::model($poll, array('method' => 'PATCH','route' => array('admin.polls.update', $poll->id))) !!}

		@include('admin.polls.form',['LabelSubmitButton'=>'Uložiť'])

	{!! Form::close() !!}
	
	@include('errors.list')

@stop