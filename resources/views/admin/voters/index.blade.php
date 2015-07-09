@extends('admin.admin')

@section('content')

	<h1>Voliči</h1>
	<hr>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>
          Meno
        </th>
        <th>
          Pohlavie
        </th>
        <th>
		<a class="btn btn-primary btn-sm" href="{{ url('admin/voters/create') }}" role="button">Create new voter</a>&nbsp;          	
        </th>
      </tr>
    </thead>
    <tbody>
	@foreach($voters as $voter)
	<tr>
		<td>
			<strong>{{ $voter->name }}</strong> 
		</td>
		<td>
			<small>[ {{$voter->sex}} ]</small>
		</td>
		<td>
		<div class="btn-group" role="group">
			<a class="btn btn-default btn-sm" href="{{ action('VotersController@show',[$voter->id]) }}" role="button">Show</a>&nbsp;
			<!-- a class="btn btn-primary btn-sm" href="{{ url('/voters',$voter->id) }}" role="button">Edit</a>&nbsp; -->
			<a class="btn btn-primary btn-sm" href="{{ action('VotersController@edit',[$voter->id]) }}" role="button">Edit</a>&nbsp;
			<a class="btn btn-danger btn-sm" href="admin/voters/{{ $voter->id }}" role="button">Delete</a>&nbsp;
		</div>
		</td>
	</tr>
	@endforeach
    </tbody>
  </table>
  
@stop