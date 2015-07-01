<!-- Zadaj meno hlasujúceho -->

@extends('app')

@section('content')
	<h1>{{ $poll-> name }}</h1>
	<p>{{ $poll->description }}</p>
	<hr>

	<!-- http://laravelcollective.com/docs/5.1/html -->
	{!! Form::open(array('url' => 'voters')) !!}

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


	{!! Form::submit('Pokračuj', ['class'=>'btn btn-primary active']); !!}
	<a class="btn btn-default active" href="{{ action('ResearchController@index') }}" role="button">Späť</a>

	{!! Form::close() !!}
	
	@include('errors.list')
	    
@stop