@extends('admin.admin')

@section('content')

	<h1>Amketa - {{ $polls->name }} </h1>
	<hr/>
	<h3>Stručný popis ankety:</h3>
	<p>
		{{ $polls-> description }}
	</p>
	<a class="btn btn-default btn-sm" href="{{ action('Admin\PollsController@index') }}" role="button">Späť</a>
@stop