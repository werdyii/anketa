<!-- Ohodnoť vybrate 3 varianty -->

@extends('app')

@section('content')

	<h2>{{ $voter['name'] }} <small>{{ $voter['sex'] }}</small></h2>

	<h4>Oboduj otázočky čim 3 body najviac 1 bod najmenej</h4>
	<table class="table">
		<thead>
			<th>3</th>
			<th>2</th>
			<th>1</th>
			<th>Voľba</th>
		</thead>
		<tbody>
		{!! Form::open(array('url' => 'step3')) !!}
		@foreach($proposals as $proposal)
		<?php $radio_name = "ratio[".$proposal->id."]"; ?>
			<tr>
  				<td>{!! Form::radio($radio_name, 3) !!}</td>
  				<td>{!! Form::radio($radio_name, 2) !!}</td>
  				<td>{!! Form::radio($radio_name, 1) !!}</td>
  				<td>{{ $proposal->proposal }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	
	<div class="row">
  		<div class="col-lg-6">
		<a class="btn btn-default btn-block" href="{{ url('step2') }}" role="button">
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