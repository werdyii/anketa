@extends('admin.admin')

@section('content')

	<h1>Amketa - {{ $poll->name }} </h1>
	<hr/>
	<h3>Stručný popis ankety:</h3>
	<p>
		{{ $poll->description }}
	</p>
	<p>Minimalny počet návrhov v ankete je: {{ $poll->limit }}</p>
	<p>Status: {{ $poll->status }}</p>	
	<p>Anketa sa začne: {{ $poll->published_at->format('l j.n.Y') }}</p>
	<p>Anketa sa skončí: {{ $poll->expires_at->format('l j.n.Y') }}</p>
	<hr/>
	<a class="btn btn-default btn-sm" href="{{ action('Admin\PollsController@index') }}" role="button">Späť</a>
@stop