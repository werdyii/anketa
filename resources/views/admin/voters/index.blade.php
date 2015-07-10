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
			<a class="btn btn-default btn-sm" href="{{ route('admin.voters.show', ['voters' => $voter->id ]) }}" role="button">Kuk</a>&nbsp;
			<a class="btn btn-primary btn-sm" href="{{ route('admin.voters.edit', ['voters' => $voter->id ]) }}" role="button">Uprav</a>&nbsp;
			<a class="btn btn-danger btn-sm" href="{{ route('admin.voters.destroy', ['method' => 'DELETE', 'voters' => $voter->id ]) }}" role="button">Zmaž</a>&nbsp;
		</div>
		</td>
	</tr>
	@endforeach
    </tbody>
  </table>
  
@stop