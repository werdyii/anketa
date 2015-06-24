@extends('app')

@section('content')

	<h1>VOLIČI</h1>
	<hr/>
	<ul>
	@foreach($voters as $voter)
		<li>{{ $voter->name }} [ {{$voter->sex}} ] </li>
	@endforeach
	</ul>
@stop