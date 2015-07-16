<!-- Zobraz všetky navrhy a vybrat 3 varianty -->

@extends('app')

@section('content')
	<h1>{{ $poll->name }}</h1>
	<p>{{ $poll->description }}</p>
	<hr>
	<h2>{{ $voter['name'] }} <small>{{ $voter['sex'] }}</small></h2>
	<!-- http://laravelcollective.com/docs/5.1/html -->
	{!! Form::open(array('url' => 'step2')) !!}
<!-- 	Form::hidden('poll_id', $poll->id )
	Form::hidden('voter_id', $voter->id )
 -->
	<ul class="list-unstyled">
  	@foreach($proposals as $proposal)
	<li>
  		<label>
  			{!! Form::checkbox('proposals[]', $proposal->id) !!}
  			{{ $proposal->proposal }}
  		</label>
	</li>
	@endforeach


	<div class="row">
  		<div class="col-lg-6 col-md-6 col-xs-6">
		<a class="btn btn-default btn-block" href="{{ url('step1', $poll->id) }}" role="button">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		späť
		</a>
		</div>
  		<div class="col-lg-6 col-md-6 col-xs-6">
		<button type="submit" value="Submit" class="btn btn-default btn-block">
		  pokračuj
		  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		</button>
		</div>
	</div>

	{!! Form::close() !!}
	
	@include('errors.list')
	    
@stop