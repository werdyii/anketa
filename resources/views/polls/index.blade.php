<!-- Zobraz všetky ankety -->

@extends('app')

@section('content')
	<h1>Ankety</h1>
	<hr>

    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Meno</th>
          <th>Popis</th>
          <th>Status</th>
          <th>Limit</th>
          <th>Spusti anketu</th>
        </tr>
      </thead>
      <tbody>
		@foreach($polls as $poll)
		<tr>
			<td><strong>{{ $poll->name }}</strong></td>
			<td>{{ $poll->description }}</td>
			<td><small>[ {{$poll->published_at}} ]</small></td>
			<td>{{ $poll->limit }}</td>
			<td><a class="btn btn-default btn-sm" href="{{ url('/proposals', $poll->id) }}" role="button">Spusti Anketu</a>&nbsp;</td>
		</tr>
		@endforeach
      </tbody>
    </table>
	    
@stop