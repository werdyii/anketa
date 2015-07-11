<!-- Ohodnoť vybrate 3 varianty -->

@extends('app')

@section('content')

	<?php $voter = $data['voter']; ?>
	<h2>{{ $voter['name'] }} <small>{{ $voter['sex'] }}</small></h2>
	<?php $proposals = $data['proposals']; ?>

	<ul class="list-unstyled">
  	@foreach($proposals as $proposal)
	<li>
  		{!! Form::checkbox('proposals[]', $proposal->id) !!}
	  	{{ $proposal->proposal }}
	</li>
	@endforeach
	</ul>
	
	@include('errors.list')
	    
@stop