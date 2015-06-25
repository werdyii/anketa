@extends('app')

@section('content')

	<h1>Vytvor nového voliča</h1>
	<hr/>
	<!-- http://laravelcollective.com/docs/5.1/html -->
	{!! Form::open(array('url' => 'voters')) !!}
		<!-- input Name	-->
	    <div class="form-group">
		    {!! Form::label('name', 'Prosím zadajte svoje meno:'); !!}
		    {!! Form::text('name', 'meno', ['class'=>'form-control']); !!}
	    </div>

		<!-- ratio Sex -->
		<div class="radio">
			<label>{!! Form::radio('sex', 'male'); !!} Muž </label>
		</div>
		<div class="radio">
			<label>{!! Form::radio('sex', 'female'); !!} Žena</label>
		</div>

		{!! Form::submit('Vytvor Voliča', ['class'=>'btn btn-primary form-control']); !!}
		
	{!! Form::close() !!}
	
	@include('errors.list')

@stop