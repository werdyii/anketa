@extends('app')

@section('content')

	<h1>Úprava  - {!! $voter->name !!}</h1>
	<hr/>
	<!-- 
		http://laravelcollective.com/docs/5.1/html 
		Form::model($voter, array ('method' => 'PATCH','action'=>['VotersController@update',$voter->id]])
	-->
	{!! Form::model($voter, array('method' => 'PATCH','route' => array('voters.update', $voter->id))) !!}
	
		<!-- input Name	-->
	    <div class="form-group">
		    {!! Form::label('name', 'Prosím zadajte svoje meno:'); !!}
		    {!! Form::text('name', null, ['class'=>'form-control']); !!}
	    </div>

		<!-- ratio Sex -->
		<div class="radio">
		  <label>{!! Form::radio('sex', 'male'); !!} Muž </label>
		</div>
		<div class="radio">
		  <label>{!! Form::radio('sex', 'female'); !!} Žena</label>
		</div>

		{!! Form::submit('Uložiť zmeny', ['class'=>'btn btn-primary form-control']); !!}
		<a class="btn btn-defau" href="{{ action('VotersController@index') }}" role="button">Späť</a>
	{!! Form::close() !!}
	
	@include('errors.list')

@stop