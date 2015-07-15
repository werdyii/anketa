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

	<canvas id="research-graph" width="300" height="200"></canvas>

	<p>Na potazky odpovedalo celkom {{ $poll->researches->count() }}</p>
	<small>Research id: {{ $research->id }}</small>

	<a class="btn btn-default btn-block" href="{{ url('/') }}" role="button">Ok</a>

@stop

@section('jscript')
<script src="/js/chart.min.js"></script>

<script>
	(function () {
		var ctx = document.getElementById('research-graph').getContext('2d');
	})();
</script>
@stop