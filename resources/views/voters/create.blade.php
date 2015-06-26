@extends('app')

@section('content')

	<h1>Vytvor nového voliča</h1>
	<hr/>
	<!-- http://laravelcollective.com/docs/5.1/html -->
	{!! Form::open(array('url' => 'voters')) !!}

		@include('voters.form',['LabelSubmitButton'=>'Vytvor Voliča'])

	{!! Form::close() !!}
	
	@include('errors.list')

@stop