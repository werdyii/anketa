@extends('admin.admin')

@section('content')

	<h1>Úprava  - {!! $voter->name !!}</h1>
	<hr/>
	<!-- 
		http://laravelcollective.com/docs/5.1/html 
		Form::model($voter, array ('method' => 'PATCH','action'=>['VotersController@update',$voter->id]])
	-->
	{!! Form::model($voter, array('method' => 'PATCH','route' => array('admin.voters.update', $voter->id))) !!}

		@include('admin.voters.form',['LabelSubmitButton'=>'Uložiť'])
	
	{!! Form::close() !!}
	
	@include('errors.list')

@stop