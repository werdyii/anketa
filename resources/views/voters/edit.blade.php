@extends('app')

@section('content')

	<h1>Úprava  - {!! $voter->name !!}</h1>
	<hr/>
	<!-- http://laravelcollective.com/docs/5.1/html -->
	{!! Form::model($voter,['method' => 'PATCH','action'=>['VotersController@update',$voter->id]]) !!}
		<!-- input Name	-->
	    <div class="form-group">
		    {!! Form::label('name', 'Prosím zadajte svoje meno:'); !!}
		    {!! Form::text('name', 'meno', ['class'=>'form-control']); !!}
	    </div>

		<!-- ratio Sex -->
		<div class="radio">
		  <label>
		    <input type="radio" name="sex" id="optionsRadios1" value="male">
		    Muž
		  </label>
		</div>
		<div class="radio">
		  <label>
		    <input type="radio" name="sex" id="optionsRadios2" value="female">
		    Žena
		  </label>
		</div>

		{!! Form::submit('Vytvor Voliča', ['class'=>'btn btn-primary form-control']); !!}
		
	{!! Form::close() !!}
	
	@if ($errors->any())
	
		<div class="alert alert-danger">
			
			@foreach($errors->all() as $error)
				<div class="row"><strong>POZOR !!! </strong> {{ $error }}</div>
			@endforeach
			
		</div>
		
	@endif

@stop