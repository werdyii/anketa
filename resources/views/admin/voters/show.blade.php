@extends('admin.admin')

@section('content')

	<h1>VOLIČ - {{ $voter->name }} </h1>
	<hr/>
	<p>Volil nasledovne:
		bla bla bla bla ....
	</p>
	<a class="btn btn-default btn-sm" href="{{ action('VotersController@index') }}" role="button">Späť</a>
@stop