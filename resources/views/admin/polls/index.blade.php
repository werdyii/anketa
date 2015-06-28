@extends('admin.admin')

@section('content')
	<h1>Ankety</h1>
	<hr>

    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Meno</th>
          <th>Status</th>
          <th>Limit</th>
          <th>
			<a class="btn btn-primary btn-sm" href="{{ url('/admin/polls/create') }}" role="button">Vytvor novu anketu</a>&nbsp;          	
          </th>
        </tr>
      </thead>
      <tbody>
		@foreach($polls as $poll)
		<tr data-toggle="tooltip" title="{{ $poll->description }}">
			<td><strong>{{ $poll->name }}</strong></td>
			<td><small>[ {{$poll->published_at}} ]</small></td>
			<td>{{ $poll->limit }}</td>
			<td>
				<div class="btn-group" role="group">
					<a class="btn btn-default btn-sm" href="{{ url('/admin/polls',$poll->id) }}" role="button">Show</a>&nbsp;
					<a class="btn btn-primary btn-sm" href="{{ url('/admin/polls/create',$poll->id,'edit') }}" role="button">Edit</a>&nbsp;
					<a class="btn btn-danger btn-sm" href="/admin/polls/{{ $poll->id }}" role="button">Delete</a>&nbsp;
				</div>
			</td>
		</tr>
		@endforeach
      </tbody>
    </table>
	    
@stop
