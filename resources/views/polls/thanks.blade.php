<!-- Podakuje za účasť v ankete. -->
<!-- Pripadne zobraziť vyhodnotenie -->
@extends('app')

@section('content')
	<h1>{{ $poll->name }}</h1>
	<p>{{ $poll->description }}</p>
	<hr>

	<h2>{{ $research->voter->name }} <small>{{ $research->voter->sex }}</small></h2>
	<ul >
		@foreach($research->proposals as $proposal)
		<li>{{ $proposal->proposal }} body( {{ $proposal->pivot->ratio }} )</li>
		@endforeach
	</ul>
	<h2>Ďakujem Vám za účasť v ankete</h2>
	<p>Na potazky odpovedalo celkom {{ $poll->researches->count() }}</p>
	<small>Research id: {{ $research->id }}</small>

	<a class="btn btn-default btn-block" href="{{ url('/') }}" role="button">Ok</a>

@stop