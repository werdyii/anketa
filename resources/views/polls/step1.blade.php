<!-- Zadaj meno hlasujúceho -->

@extends('app')

@section('content')
	<h1>{{ $poll-> name }}</h1>
	<p>{{ $poll->description }}</p>
	<hr>

	<!-- http://laravelcollective.com/docs/5.1/html -->
	{!! Form::open(array('url' => 'step1')) !!}
	{!! Form::hidden('poll_id', $poll->id ) !!}

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

	<div class="row">
  		<div class="col-lg-6">
		<a class="btn btn-default btn-block" href="{{ url('/') }}" role="button">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		späť
		</a>
		</div>
  		<div class="col-lg-6">
		<button type="submit" value="Submit" class="btn btn-default btn-block">
		  pokračuj
		  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		</button>
		</div>
	</div>

	{!! Form::close() !!}
	
	@include('errors.list')
	    
@stop